<?php

namespace App\Providers\ProductProvider;

use Illuminate\Support\ServiceProvider;
use App\Classes\ProductClass\PevProductAttributePriceClass;

class PevProductAttributePriceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PevProductAttributePriceClass', function ($app) {
            return new PevProductAttributePriceClass();
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
