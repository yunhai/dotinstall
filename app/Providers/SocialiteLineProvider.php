<?php

namespace App\Providers;

class SocialiteLineProvider extends AbstractProvider implements ProviderInterface
{
    protected $scopeSeparator = ' ';

    protected $scopes = [
        'openid',
        'profile',
        'email',
    ];

    protected function getAuthUrl($state)
    {
        return $this->buildAuthUrlFromBase(
            'https://access.line.me/oauth2/v2.1/authorize', $state
        );
    }

    protected function getTokenUrl()
    {
        return 'https://api.line.me/oauth2/v2.1/token';
    }

    protected function getUserByToken($token)
    {
        $response = $this->getHttpClient()->get(
            'https://api.line.me/v2/profile', [
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
