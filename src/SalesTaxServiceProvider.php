<?php

use Illuminate\Support\ServiceProvider;

class SalesTaxServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/sales-tax.php' => config_path('sales-tax.php', 'config'),
        ]);
    }

    public function register()
    {

    }
}
