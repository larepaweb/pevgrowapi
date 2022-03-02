<?php

namespace App\Providers\HomePersonalizadaProvider;

use Illuminate\Support\ServiceProvider;
use App\Classes\HomePersonalizadaClass\PevCategoryVisitedClass;

class PevCategoryVisitedProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PevCategoryVisitedClass', function ($app) {
            return new PevCategoryVisitedClass();
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
