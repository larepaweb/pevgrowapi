<?php

namespace App\Providers\CarrierProvider;

use Illuminate\Support\ServiceProvider;
use App\Classes\CarrierClass\PevCarrierRangePriceClass;

class PevCarrierRangePriceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PevCarrierRangePriceClass', function ($app) {
            return new PevCarrierRangePriceClass();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
