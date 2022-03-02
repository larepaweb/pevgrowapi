<?php

namespace App\Providers\CarrierProvider;

use Illuminate\Support\ServiceProvider;
use App\Classes\CarrierClass\PevCarrierShippingCostClass;

class PevCarrierShippingCostProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PevCarrierShippingCostClass', function ($app) {
            return new PevCarrierShippingCostClass();
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
