<?php

namespace App\Providers\FaqProvider;

use Illuminate\Support\ServiceProvider;
use App\Classes\FaqsClass\PevFaqLangClass;

class PevFaqLangProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PevFaqLangClass', function ($app) {
            return new PevFaqLangClass();
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
