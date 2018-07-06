<?php

namespace App\Providers;

use Laravel\Socialite\Two\AbstractProvider;
use Laravel\Socialite\Two\ProviderInterface;
use Laravel\Socialite\Two\User;

class SocialiteYahooJpProvider extends AbstractProvider implements ProviderInterface
{
    protected $scopeSeparator = ' ';

    protected $scopes = [
        'openid',
        'profile',
        'email',
    ];

    protected function getAuthUrl($state)
    {
        return $this->buildAuthUrlFromBase('https://auth.login.yahoo.co.jp/yconnect/v1/authorization', $state);
    }

    protected function getTokenUrl()
    {
        return 'https://auth.login.yahoo.co.jp/yconnect/v1/token';
    }

    protected function getUserByToken($token)
    {
        $response = $this->getHttpClient()->get(
            'https://userinfo.yahooapis.jp/yconnect/v1/attribute?schema=openid', [
            'headers' => [
                'Authorization' => 'Bearer '.$token,
            ],
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    protected function mapUserToObject(array $user)
    {
        return (new User())->setRaw($user)->map([
            'id' => $user['userId'] ?? $user['sub'] ?? null,
            'nickname' => null,
            'name' => $user['displayName'] ?? $user['name'] ?? null,
            'avatar' => $user['pictureUrl'] ?? $user['picture'] ?? null,
            'email' => $user['email'] ?? null,
        ]);
    }

    protected function getTokenFields($code)
    {
        return array_merge(parent::getTokenFields($code), [
            'grant_type' => 'authorization_code',
        ]);
    }
}
