<?php

namespace App\Providers\ProductProvider;

use Illuminate\Support\ServiceProvider;
use App\Classes\ProductClass\PevProductFeatureClass;

class PevProductFeatureProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PevProductFeatureClass', function ($app) {
            return new PevProductFeatureClass();
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
