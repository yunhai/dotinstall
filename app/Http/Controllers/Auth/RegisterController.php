<?php

namespace App\Http\Controllers\Auth;

use App\Models\User\User;
use App\Models\Invitation;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Socialite;
use App\Http\Service\SocialAccountService;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('web');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $unique = str_random();
        $model = new User();

        $target = $model->create([
            'name' => $unique . $data['name'],
            'email' => $unique . $data['email'],
            'password' => Hash::make($data['password']),
            'role' => USER_ROLE_PUBLIC,
            'provider' => isset($data['provider']) ? $data['provider'] : '',
            'provider_user_id' => isset($data['provider_user_id']) ? $data['provider_user_id'] : '',
        ]);

        if (!empty($data['token'])) {
            $model->updateInvitation($data['token'], $target->id);
        }

        return $target;
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
        //$user = Socialite::driver($provider)->stateless();
        $social_account_service = SocialAccountService::createOrGetUser($user, $provider);
        $id = $user->id;
        $name = $user->name;
        $email = $user->email;
        if (!empty($social_account_service)) {
            Auth::attempt(['name' => $name, 'email' => $email]);
            return redirect('/');
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
}
