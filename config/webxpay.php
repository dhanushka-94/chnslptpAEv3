<?php

return [
    /*
    |--------------------------------------------------------------------------
    | WebXPay Configuration
    |--------------------------------------------------------------------------
    |
    | Configuration for WebXPay payment gateway integration.
    | Defaults are dummy placeholders for local/dev — set real values in .env.
    |
    */

    'api_username' => env('WEBXPAY_API_USERNAME', 'dummy_webxpay_user'),
    'api_password' => env('WEBXPAY_API_PASSWORD', 'dummy_webxpay_password'),
    'secret_key' => env('WEBXPAY_SECRET_KEY', '00000000-0000-0000-0000-000000000000'),

    'public_key' => env('WEBXPAY_PUBLIC_KEY', '-----BEGIN PUBLIC KEY-----
DUMMYWEBXPAYPUBLICKEYPLACEHOLDERONLYNOTREAL=
-----END PUBLIC KEY-----'),

    'mode' => env('WEBXPAY_MODE', 'sandbox'), // live or sandbox

    'sandbox_url' => 'https://stagingxpay.info/index.php?route=checkout/billing',
    'live_url' => 'https://webxpay.com/index.php?route=checkout/billing',

    'checkout_url' => env('WEBXPAY_CHECKOUT_URL') ?: (env('WEBXPAY_MODE', 'sandbox') === 'live'
        ? 'https://webxpay.com/index.php?route=checkout/billing'
        : 'https://stagingxpay.info/index.php?route=checkout/billing'),

    'currency' => 'LKR',
    'supported_currencies' => ['LKR', 'USD'],

    'encryption_method' => 'JCs3J+6oSz4V0LgE0zi/Bg==',

    'cms' => 'Laravel',

    'status_codes' => [
        '1' => 'success',
        '2' => 'pending',
        '3' => 'failed',
        '4' => 'cancelled',
        '5' => 'declined',
        '6' => 'expired',
    ],

    'return_url' => env('WEBXPAY_RETURN_URL', env('APP_URL') . '/pay/webxpayResponse'),
    'cancel_url' => env('WEBXPAY_CANCEL_URL', env('APP_URL') . '/payment/webxpay/cancel'),
    'notify_url' => env('WEBXPAY_NOTIFY_URL', env('APP_URL') . '/payment/webxpay/notify'),
];
