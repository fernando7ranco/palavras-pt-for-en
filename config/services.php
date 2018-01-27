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
	
	'facebook' => [
		'client_id' => '377367069347737',
		'client_secret' => '87bf0d567498391fe1fc1493bb0c26d3',
		'redirect' => 'http://localhost/projeto/public/authsocial/callbackoffacebook',
	],

	'google' => [
		'client_id' => '218396736929-npedhir8ifttcrm22cj253nlfsd22u5m.apps.googleusercontent.com',
		'client_secret' => 'Qpsk9TNVCKf3RRgvAdSV8vTC',
		'redirect' => 'http://localhost/projeto/public/authsocial/callbackofgoogle',
	],
	
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

];
