<?php

namespace App\Providers\CurrencyProvider;

use Illuminate\Support\ServiceProvider;
use App\Classes\CurrencyClass\PevCurrencyClass;

class PevCurrencyProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PevCurrencyClass', function ($app) {
            return new PevCurrencyClass();
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
