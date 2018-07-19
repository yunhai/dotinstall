<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Service\SocialAccountService;
use App\Models\User\User;
use App\Models\Affiliator\AffiliatorInvitation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Socialite;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('web');
    }

    protected function validator(array $data)
    {
        $validator = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ];
        if (!empty($data['password'])) {
            $validator['password'] = 'required|string|min:6';
        }
        return Validator::make($data, $validator);
    }

    protected function create(array $data)
    {
        $model = new User();
        $target = $model->init($data);

        if (!empty($data['token'])) {
            $affiliator_invitation = new AffiliatorInvitation();

            $invitations = [
                'token' => $data['token'],
                'user_id' => $target->id,
            ];

            $affiliator_invitation->init($invitations);
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
