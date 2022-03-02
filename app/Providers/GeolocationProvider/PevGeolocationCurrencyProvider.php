<?php

namespace App\Providers\GeolocationProvider;

use Illuminate\Support\ServiceProvider;
use App\Classes\GeolocationClass\PevGeolocationCurrencyClass;

class PevGeolocationCurrencyProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PevGeolocationCurrencyClass', function ($app) {
            return new PevGeolocationCurrencyClass();
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
