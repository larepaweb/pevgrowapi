<?php

namespace App\Providers\ZonePaisProvinciaProvider;

use Illuminate\Support\ServiceProvider;
use App\Classes\ZonePaisProvinciaClass\PevCountryClass;

class PevCountryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PevCountryClass', function ($app) {
            return new PevCountryClass();
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
