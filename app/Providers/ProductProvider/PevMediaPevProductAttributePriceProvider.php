<?php

namespace App\Providers\ProductProvider;
use App\Classes\ProductClass\PevMediaPevProductAttributePriceClass;

use Illuminate\Support\ServiceProvider;

class PevMediaPevProductAttributePriceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PevMediaPevProductAttributePriceClass', function ($app) {
            return new PevMediaPevProductAttributePriceClass();
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
