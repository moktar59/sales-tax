<?php
namespace Bglobal\SalesTax;

use Illuminate\Support\ServiceProvider;

class SalesTaxServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/sales-tax.php' => config_path('sales-tax.php'),
        ]);
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/sales-tax.php', 'tax'
        );
    }
}
