<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Product / category image base URL (SMA uploads)
    |--------------------------------------------------------------------------
    |
    | Relative filenames in sma_products.image and sma_product_photos.photo
    | are prefixed with this URL.
    |
    | Example full URL:
    |   https://erp.chancelaptops.ae/assets/uploads/{filename}.png
    |
    */

    'image_base_url' => rtrim(env('PRODUCT_IMAGE_BASE_URL', 'https://erp.chancelaptops.ae/assets/uploads'), '/') . '/',

    /*
    | WhatsApp number for wholesale / In Stock UAE purchase enquiries
    | and the site floating WhatsApp button (digits only for wa.me).
    */
    'whatsapp_number' => preg_replace('/\D+/', '', env('WHATSAPP_NUMBER', '971522306476')),
    'whatsapp_display' => env('WHATSAPP_DISPLAY', '+971 52 230 6476'),
    'wholesale_min_units' => 5,

];
