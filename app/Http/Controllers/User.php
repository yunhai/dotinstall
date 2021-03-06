<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\PostChangePassword as PostChangePasswordRequest;
use App\Http\Requests\User\PostChangeEmail as PostChangeEmailRequest;

use App\Http\Service\Payment\StripeService;
use App\Http\Service\UtmTracking\UtmTrackingService;
use App\Http\Service\Mail\MailerService;
use App\Models\Subscription;
use App\Models\User\User as UserModel;
use App\Models\User\UserActivation;
use Carbon\Carbon;
use Crypt;

use Auth;
use Illuminate\Http\Request;

class User extends Base
{
    public function __construct(
        UserModel $user_model
    ) {
        $this->model = $user_model;
    }

    public function getUpgrade()
    {
        if (Auth::user()->grade == USER_GRADE_DIAMOND && Auth::user()->diamond) {
            return redirect()->route('mypage');
        }

        return $this->render('user.upgrade');
    }

    public function getDestroy()
    {
        $user_id = Auth::id();
        if (Auth::user()->grade == USER_GRADE_DIAMOND) {
            $payment_service = new StripeService();
            $payment_service->cancel($user_id);
        }

        $this->model->remove($user_id);

        auth('web')->logout();
        return redirect()->route('top');
    }

    public function postUpgrade(Request $request)
    {
        $user = Auth::user()->toArray();

        if ($user['grade'] == USER_GRADE_DIAMOND && Auth::user()->diamond) {
            return redirect()->route('mypage');
        }

        $user_id = $user['id'];

        $utm = $request->get('utm');
        if ($utm) {
            $this->saveUtm($utm, $user_id);
        }
        $input = $request->all();
        $token = $input['stripeToken'];

        $error = [];
        $payment_service = new StripeService();
        $flag = $payment_service->charge($user_id, $token, $error);

        if ($flag) {
            $this->sendRegistryDiamondEmail($user);
            $this->notifyRegistryDiamondEmail();
            return redirect()->back()->with('success', true);
        }

        return redirect()->back()->with('error', $error);
    }

    public function makeUpgrade(Request $request, array $user, array &$error = [])
    {
        $user_id = $user['id'];
        $utm = $request->get('utm');
        if ($utm) {
            $this->saveUtm($utm, $user_id);
        }
        $input = $request->all();
        $token = $input['stripeToken'];

        $error = [];
        $payment_service = new StripeService();
        $flag = $payment_service->charge($user_id, $token, $error);

        if ($flag) {
            $this->sendRegistryDiamondEmail($user);
            $this->notifyRegistryDiamondEmail();
        }

        return $flag;
    }

    private function saveUtm(array $utm, int $user_id)
    {
        $service = new UtmTrackingService();
        $service->save($utm, $user_id);

        return true;
    }

    public function getDowngrade()
    {
        if (Auth::user()->grade == USER_GRADE_NORMAL) {
            return redirect()->route('mypage');
        }

        $user = Auth::user()->toArray();
        $user_id = $user['id'];

        $payment_service = new StripeService();
        $flag = $payment_service->cancel($user_id);

        if ($flag) {
            $last_subscription = $this->getLastSubscription($user_id);
            $this->sendStopDiamondEmail($user, $last_subscription);
            $this->model->updateDiamondEndAt($user_id, $last_subscription);
            return redirect()->back()->with('success', true);
        }

        return redirect()->back()->with('error', $error);
    }

    private function getLastSubscription($user_id)
    {
        $subcription_model = new Subscription();
        return $subcription_model->lastest($user_id);
    }

    private function sendStopDiamondEmail(array $user, array $subscription)
    {
        $deadline = '';
        if ($subscription['ends_at']) {
            $deadline = Carbon::createFromFormat('Y-m-d H:i:s', $subscription['ends_at'])
                        ->format('Y年m月d日');
        }

        $mailer = new MailerService();
        $name = 'Mail\User\StopDiamondEmail';

        $mail = [
            'to' => [$user['email'], $user['name']],
            'data' => [
                'user' => $user,
                'deadline' => $deadline
            ]
        ];

        $mailer->send($name, $mail);
    }

    private function notifyRegistryDiamondEmail()
    {
        $mailer = new MailerService();
        $name = 'Mail\User\NotifyRegistryDiamondEmail';

        $mail = [
            'to' => [env('APP_ADMIN_MAIL'), env('APP_ADMIN_NAME')],
        ];

        $mailer->send($name, $mail);
    }

    private function sendRegistryDiamondEmail(array $user)
    {
        $user_id = $user['id'];
        $mailer = new MailerService();
        $name = 'Mail\User\RegistryDiamondEmail';

        $mail = [
            'to' => [$user['email'], $user['name']],
            'data' => [
                'user' => $user
            ]
        ];

        $mailer->send($name, $mail);
    }

    public function getChangePassword()
    {
        if (Auth::user()->provider) {
            return redirect()->route('mypage');
        }
        return view('user.change_password');
    }

    public function postChangePassword(PostChangePasswordRequest $request)
    {
        $input = $request->all();

        $user = Auth::user();
        $user->password = bcrypt($input['new_password']);
        $user->save();

        return redirect()->back()->with('success', '更新しました');
    }
    
    public function getChangeEmail()
    {
        if (Auth::user()->provider) {
            return redirect()->route('mypage');
        }
        return view('user.change_email');
    }

    public function postChangeEmail(PostChangeEmailRequest $request)
    {
        $input = $request->all();
        $token = hash_hmac('sha256', str_random(40), config('app.key'));
        
        $model = new UserActivation();
        $model->create(
            [
                'user_id' => Auth::id(),
                'token' => $token
            ]
        );

        $mailer = new MailerService();
        $name = 'Mail\User\ChangeEmailConfirmation';

        $email = $input['email'];

        $json = json_encode(compact('email', 'token'));
        $encrypt = Crypt::encrypt($json);
        $mail = [
            'to' => [$email],
            'data' => [
                'token' => $encrypt
            ]
        ];

        $mailer->send($name, $mail);
        return redirect()->back()->with('user_change_email_confirmation', true);
    }

    public function getChangeEmailFinish(Request $request)
    {
        $input = $request->all();
        $token = $input['token'];
    
        $json = json_decode(Crypt::decrypt($token), true);
        $token = $json['token'] ?? '';
        $email = $json['email'] ?? '';
        
        $model = new UserActivation();
        $user = $model->getActivationByToken($token);
        if (!$user) {
            abort(404);
        }
        $user->delete();
        $user_id = $user->user_id;

        $this->model->where('id', $user_id)->update(['email' => $email]);

        return redirect()
                    ->route('user.change_email')
                    ->with('user_change_email_finish', true);
    }
}
