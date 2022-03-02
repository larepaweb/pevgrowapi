<?php

namespace App\Providers\ProductProvider;

use Illuminate\Support\ServiceProvider;
use App\Classes\ProductClass\PevProductFeatureValueLangClass;

class PevProductFeatureValueLangProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PevProductFeatureValueLangClass', function ($app) {
            return new PevProductFeatureValueLangClass();
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
