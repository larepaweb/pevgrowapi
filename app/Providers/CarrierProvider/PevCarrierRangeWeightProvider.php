<?php

namespace App\Providers\CarrierProvider;

use Illuminate\Support\ServiceProvider;
use App\Classes\CarrierClass\PevCarrierRangeWeightClass;

class PevCarrierRangeWeightProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PevCarrierRangeWeightClass', function ($app) {
            return new PevCarrierRangeWeightClass();
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
