<?php

namespace App\Providers\ZonePaisProvinciaProvider;

use Illuminate\Support\ServiceProvider;
use App\Classes\ZonePaisProvinciaClass\PevCountryLangClass;

class PevCountryLangProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PevCountryLangClass', function ($app) {
            return new PevCountryLangClass();
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
