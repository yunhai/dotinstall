<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Service\SocialAccountService;
use App\Http\Service\ActivationService;
use App\Models\Affiliator\Affiliator;
use App\Models\Affiliator\AffiliatorInvitation;
use App\Models\User\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Socialite;
use App\Rules\checkExistEmailRegistrationRule;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/';
    protected $activationService;

    public function __construct(ActivationService $activationService)
    {
        $this->middleware('web');
        $this->activationService = $activationService;
    }

    protected function validator(array $data)
    {
        $validator = [
            'email' => ['required', 'string', 'email', 'max:255', new checkExistEmailRegistrationRule()],
        ];

        if (empty($data['provider'])) {
            $validator['password'] = 'required|string|min:6|confirmed';
            $validator['password_confirmation'] = 'required|string|min:6';
        }

        return Validator::make($data, $validator);
    }

    protected function makeCreate(array $data)
    {
        $affiliator_id = 0;
        if (!empty($data['token'])) {
            $affiliator_model = new Affiliator();
            $affiliator = $affiliator_model->getByToken($data['token']);
            $affiliator_id = $affiliator['id'];
            $data['affiliator_id'] = $affiliator_id;
        }
        
        $model = new User();
        $target = $model->init($data);

        if ($affiliator_id) {
            $affiliator_invitation = new AffiliatorInvitation();

            $invitations = [
                'user_id' => $target->id,
                'token' => $data['token'],
                'grade' => $data['grade'],
                'affiliator_id' => $affiliator_id
            ];

            $affiliator_invitation->init($invitations);
        }

        return $target;
    }

    public function register(Request $request)
    {
        $input = $request->all();
        $input['grade'] = USER_GRADE_NORMAL;

        return $this->makeRegister($input);
    }

    public function registerDiamond(Request $request)
    {
        $input = $request->all();
        $input['grade'] = USER_GRADE_PENDING_DIAMOND;

        return $this->makeRegister($input);
    }

    private function makeRegister(array $input)
    {
        if (empty($input['password'])) {
            $input['password'] = env('APP_DEFAULT_PASSWORD');
        }
        $this->validator($input)->validate();

        $user = $this->makeCreate($input);
        $this->activationService->sendActivationMail($user);

        return redirect()->route('register.done')->with('email', $user->email);
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        if ($provider == 'google') {
            $user = Socialite::driver($provider)->stateless()->user();
        } else {
            $user = Socialite::driver($provider)->user();
        }

        $social_account_service = SocialAccountService::createOrGetUser($user, $provider);
        $id = $user->id;
        $name = $user->name;
        $email = $user->email;

        if (!empty($social_account_service)) {
            Auth::attempt(['name' => $name, 'email' => $email]);
            return redirect()->route('top');
        }

        return redirect()->route(
            'register',
            [
                'provider' => $provider,
                'provider_user_id' => $id,
                'name' => $name,
                'email' => $email
            ]
        );
    }

    public function activateUser($token)
    {
        $user = $this->activationService->activateUser($token);
        if ($user) {
            auth()->login($user);
            $name = 'mypage';

            if ($user->grade === USER_GRADE_PENDING_DIAMOND) {
                $name = 'user.upgrade';
            }

            return redirect()->route($name);
        }
        abort(404);
    }

    public function registerDone()
    {
        return view('auth.register_done');
    }
}
