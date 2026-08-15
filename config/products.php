<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Product / category image base URL (SMA uploads)
    |--------------------------------------------------------------------------
    */

    'image_base_url' => rtrim(env('PRODUCT_IMAGE_BASE_URL', 'https://erp.chancelaptops.ae/assets/uploads'), '/') . '/',

    /*
    | Contact / WhatsApp
    */
    'whatsapp_number' => preg_replace('/\D+/', '', env('WHATSAPP_NUMBER', '971581811579')),
    'whatsapp_display' => env('WHATSAPP_DISPLAY', '+971 58 181 1579'),
    'phone_display' => env('PHONE_DISPLAY', '+971 58 181 1579'),
    'phone_tel' => preg_replace('/\D+/', '', env('PHONE_NUMBER', '971581811579')),
    'wholesale_min_units' => 5,

    /*
    | Store address (Sharjah, UAE)
    */
    'store_address' => env(
        'STORE_ADDRESS',
        'SHUBRA NO.18-19 MALEHA STREET, BEHIND SOUK AL MUBARAK HYPERMARKET, INDUSTRIAL AREA 5, SHARJAH, UNITED ARAB EMIRATES'
    ),
    'store_address_lines' => [
        'SHUBRA NO.18-19 MALEHA STREET',
        'Behind Souk Al Mubarak Hypermarket',
        'Industrial Area 5, Sharjah',
        'United Arab Emirates',
    ],

    /*
    | Social media
    */
    'facebook_url' => env('FACEBOOK_URL', 'https://www.facebook.com/profile.php?id=61592877957245'),
    'instagram_url' => env('INSTAGRAM_URL', 'https://www.instagram.com/chancelaptopae/'),

    /*
    | Store currency and hours (UAE)
    */
    'currency' => env('APP_CURRENCY', 'AED'),
    'currency_name' => 'UAE Dirhams',
    'working_hours' => 'Everyday 11:00 AM – 11:00 PM · Friday Closed',

];
