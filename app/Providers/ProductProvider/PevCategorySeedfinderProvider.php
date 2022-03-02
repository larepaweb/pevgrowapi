<?php

namespace App\Providers\ProductProvider;

use Illuminate\Support\ServiceProvider;  
use App\Classes\ProductClass\PevCategorySeedfinderClass;

class PevCategorySeedfinderProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PevCategorySeedfinderClass', function ($app) {
            return new PevCategorySeedfinderClass();
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
