<?php

namespace App\Providers\ZonePaisProvinciaProvider;

use Illuminate\Support\ServiceProvider;
use App\Classes\ZonePaisProvinciaClass\PevZoneClass;

class PevZoneProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PevZoneClass', function ($app) {
            return new PevZoneClass();
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
