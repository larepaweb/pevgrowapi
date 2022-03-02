<?php

namespace App\Providers\CustomerProvider;

use Illuminate\Support\ServiceProvider;
use App\Classes\CustomerClass\PevCustomerGroupClass;


class PevCustomerGroupProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PevCustomerGroupClass', function ($app) {
            return new PevCustomerGroupClass();
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
