<?php

namespace App\Http\Service;

use Laravel\Socialite\Contracts\User as ProviderUser;
use App\Models\User\User;

class SocialAccountService
{
    public static function createOrGetUser(ProviderUser $providerUser, $provider)
    {
        $account = User::whereProvider($provider)
            ->whereProviderUserId($providerUser->getId())
            ->first();
        return $account;
    }
}
