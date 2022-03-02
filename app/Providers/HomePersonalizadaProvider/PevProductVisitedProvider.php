<?php

namespace App\Providers\HomePersonalizadaProvider;

use Illuminate\Support\ServiceProvider;
use App\Classes\HomePersonalizadaClass\PevProductVisitedClass;

class PevProductVisitedProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PevProductVisitedClass', function ($app) {
            return new PevProductVisitedClass();
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
