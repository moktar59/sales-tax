<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Sales Tax configuration settings
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for api key and time interval in hour
    | to get the latest tax rate.
    | SALES_TAX_UPDATE_INTERVAL should be on hour
    |
    | To learn more: https://api.taxrates.io/
    |
    */

    'secret' => env('SALES_TAX_API_KEY', 'JfO14UiAkPR39ZIKGYhqXP7MYb4SoSSkesChlz'),

    'update_interval' => env('SALES_TAX_UPDATE_INTERVAL', '60'),
];
