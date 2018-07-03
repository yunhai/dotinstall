<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'twitter' => [
        'client_id' => env('TWITTER_APP_ID'),
        'client_secret' => env('TWITTER_APP_SECRET'),
        'redirect' => env('TWITTER_APP_CALLBACK_URL'),
    ],
    'facebook' => [
        'client_id' => '253065261405558',//change me
        'client_secret' => '78c07c86f753c8b9104731d6b94fcfad',//change me
        'redirect' => 'http://programinggo.srv/auth/facebook/callback',//change me
    ],
    'google' => [
        'client_id' => '87608866651-261e8l1detdbsvc0466dfnemtu51cmmb.apps.googleusercontent.com',//change me
        'client_secret' => 'WbPNme_eN6C8gY3wQl-Qlg-y',//change me
        'redirect' => 'http://127.0.0.1/auth/google/callback',//change me
    ],

];
