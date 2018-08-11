<?php

namespace App\Http\Service;

use Laravel\Socialite\Contracts\User as ProviderUser;
use App\Models\User\User;

class SocialAccountService
{
    public static function createOrGetUser(ProviderUser $providerUser, $provider)
    {
        return User::whereProvider($provider)
            ->whereProviderUserId($providerUser->getId())
            ->where('mode', MODE_ENABLE)
            ->first();
    }
}
