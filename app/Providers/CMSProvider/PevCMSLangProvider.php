<?php

namespace App\Providers\CMSProvider;

use Illuminate\Support\ServiceProvider;
use App\Classes\CMSClass\PevCMSLangClass;

class PevCMSLangProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PevCMSLangClass', function ($app) {
            return new PevCMSLangClass();
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
