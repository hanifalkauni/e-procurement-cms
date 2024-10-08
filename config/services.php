<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    
    'user_auth_service' => [
        'base_url' => env('USER_AUTH_SERVICE_BASE_URL', 'http://user-auth-service/api'),
    ],

    'vendor_service' => [
        'base_url' => env('VENDOR_SERVICE_BASE_URL', 'http://vendor-service/api'),
    ],

    'procurement_service' => [
        'base_url' => env('PROCUREMENT_SERVICE_BASE_URL', 'http://procurement-service/api'),
    ],

];
