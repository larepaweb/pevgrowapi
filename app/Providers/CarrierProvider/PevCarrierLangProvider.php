<?php

namespace App\Providers\CarrierProvider;

use Illuminate\Support\ServiceProvider;
use App\Classes\CarrierClass\PevCarrierLangClass;

class PevCarrierLangProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PevCarrierLangClass', function ($app) {
            return new PevCarrierLangClass();
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
