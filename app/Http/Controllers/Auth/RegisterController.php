<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Service\SocialAccountService;
use App\Http\Service\ActivationService;
use App\Models\User\User;
use App\Models\Affiliator\AffiliatorInvitation;
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

    protected function create(array $data)
    {
        $model = new User();
        $target = $model->init($data);

        if (0 && !empty($data['token'])) {
            $affiliator_invitation = new AffiliatorInvitation();

            $invitations = [
                'token' => $data['token'],
                'user_id' => $target->id,
            ];

            $affiliator_invitation->init($invitations);
        }

        return $target;
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $input = $request->all();
        if (empty($input['password'])) {
            $input['password'] = env('APP_DEFAULT_PASSWORD');
        }
        $this->validator($input)->validate();
        $user = $this->create($input);
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
        if ($user = $this->activationService->activateUser($token)) {
            auth()->login($user);
            return redirect()->route('mypage');
        }
        abort(404);
    }

    public function registerDone()
    {
        return view('auth.register_done');
    }
}
