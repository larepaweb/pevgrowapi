<?php

namespace App\Providers\CustomerProvider;

use Illuminate\Support\ServiceProvider;
use App\Classes\CustomerClass\PevCustomerGroupLangClass;

class PevCustomerGroupLangProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PevCustomerGroupLangClass', function ($app) {
            return new PevCustomerGroupLangClass();
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
