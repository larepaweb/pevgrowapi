<?php

namespace App\Providers\ProductProvider;

use Illuminate\Support\ServiceProvider;
use App\Classes\ProductClass\PevMediaPevProductClass;

class PevMediaPevProductProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PevMediaPevProductClass', function ($app) {
            return new PevMediaPevProductClass();
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
