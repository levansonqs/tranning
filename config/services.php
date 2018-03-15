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
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '1640879726007600',
        'client_secret' => '41c88b1480c4ed1219dddb676569d083',
        'redirect' => 'http://localhost:8000/auth/facebook/callback',
    ],

    'google' => [
        'client_id' => '949511287238-qn6m0qqkjcjp4acb6nt25k3oj6e4cpe2.apps.googleusercontent.com',
        'client_secret' => 'IDMVtCs428Y559UIniHVUPIo',
        'redirect' => 'http://localhost:8000/auth/google/callback',
    ],

    'twitter' => [
        'client_id' => 'BVGWmTsXwOkv6ctKooKg0mBr6',
        'client_secret' => 'G7aCn6XcH4b4U6KNroxaHAdNL673EGBu9Xc4pE6sj77TCuN8SG',
        'redirect' => 'http://localhost:8000/auth/twitter/callback',
    ],
];
