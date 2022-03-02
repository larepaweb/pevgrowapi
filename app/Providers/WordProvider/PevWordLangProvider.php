<?php

namespace App\Providers\WordProvider;

use Illuminate\Support\ServiceProvider;
use App\Classes\WordsClass\PevWordLangClass;

class PevWordLangProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PevWordLangClass', function ($app) {
            return new PevWordLangClass();
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
