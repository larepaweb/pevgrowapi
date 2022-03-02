<?php

namespace App\Providers\CustomerProvider;

use Illuminate\Support\ServiceProvider;
use App\Classes\CustomerClass\PevAddressClass;

class PevAddressProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PevAddressClass', function ($app) {
            return new PevAddressClass();
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
