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
