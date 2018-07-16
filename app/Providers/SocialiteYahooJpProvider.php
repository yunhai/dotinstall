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

    /**
     * Get the POST fields for the token request.
     *
     * @param  string  $code
     * @return array
     */
    protected function getTokenFields($code)
    {
        return array_add(
            parent::getTokenFields($code), 'grant_type', 'authorization_code'
        );
    }

    //Token取得の際のオプション
    //Basic認証と必要なPOSTパラメータを送付
    public function getAccessTokenResponse($code)
    {
        $basic_auth_key = base64_encode($this->clientId.":".$this->clientSecret);
        $response = $this->getHttpClient()->post($this->getTokenUrl(), [
            //認証
            'headers' => [
                'Authorization' => 'Basic '.$basic_auth_key,
            ],
            // 直接記述
            'form_params' => [
                'grant_type' => 'authorization_code',
                'code' => $code,
                'redirect_uri' => $this->redirectUrl
            ],
        ]);

        return json_decode($response->getBody(), true);
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
              'id' => $user['user_id'],
              'name' => $user['name'],
              'email' => $user['email'],
        ]);
    }

}
