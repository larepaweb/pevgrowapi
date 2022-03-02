<?php

namespace App\Providers\ZonePaisProvinciaProvider;

use Illuminate\Support\ServiceProvider;
use App\Classes\ZonePaisProvinciaClass\PevStateClass;

class PevStateProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PevStateClass', function ($app) {
            return new PevStateClass();
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
