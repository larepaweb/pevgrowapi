<?php

namespace App\Providers\LangProvider;

use Illuminate\Support\ServiceProvider;
use App\Classes\LangsClass\PevLangClass;

class PevLangProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PevLangClass', function ($app) {
            return new PevLangClass();
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
