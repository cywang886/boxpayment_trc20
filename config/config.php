<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Box Payment 
    |--------------------------------------------------------------------------
    |
    | You can configure the gateway settings from here.
    |
    */
    'base_url' => env('BOX_PAYMENT_BASE_URL'),
    'callback_uri' => env('BOX_PAYMENT_CALLBACK_URI'),
    'api_key' => env('BOX_PAYMENT_API_KEY'),
    'iv' => env('BOX-PAYMENT_IV'),
];
