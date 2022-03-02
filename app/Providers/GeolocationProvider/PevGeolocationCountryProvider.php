<?php

namespace App\Providers\GeolocationProvider;

use Illuminate\Support\ServiceProvider;
use App\Classes\GeolocationClass\PevGeolocationCountryClass;

class PevGeolocationCountryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PevGeolocationCountryClass', function ($app) {
            return new PevGeolocationCountryClass();
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
