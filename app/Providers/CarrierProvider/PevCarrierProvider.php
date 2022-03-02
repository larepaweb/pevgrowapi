<?php

namespace App\Providers\CarrierProvider;

use Illuminate\Support\ServiceProvider;
use App\Classes\CarrierClass\PevCarrierClass;

class PevCarrierProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PevCarrierClass', function ($app) {
            return new PevCarrierClass();
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
