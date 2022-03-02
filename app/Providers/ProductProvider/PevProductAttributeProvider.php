<?php

namespace App\Providers\ProductProvider;

use Illuminate\Support\ServiceProvider;
use App\Classes\ProductClass\PevProductAttributeClass;

class PevProductAttributeProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PevProductAttributeClass', function ($app) {
            return new PevProductAttributeClass();
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
