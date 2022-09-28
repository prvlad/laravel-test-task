<?php

return [

    'sms_provider' => env('SMS_PROVIDER', ''),

    'nexmo' => [
        'api_host' => env('NEXMO_API_HOST', ''),
        'api_key' => env('NEXMO_API_KEY', '')
    ],

    'twilio' => [
        'api_host' => env('TWILIO_API_HOST', ''),
        'api_key' => env('TWILIO_API_KEY', '')
    ]
];
