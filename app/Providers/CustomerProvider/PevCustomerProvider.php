<?php

namespace App\Providers\CustomerProvider;

use Illuminate\Support\ServiceProvider;
use App\Classes\CustomerClass\PevCustomerClass;


class PevCustomerProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PevCustomerClass', function ($app) {
            return new PevCustomerClass();
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
