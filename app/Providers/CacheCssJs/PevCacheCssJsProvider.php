<?php

namespace App\Providers\CacheCssJs;

use Illuminate\Support\ServiceProvider;
use App\Classes\CacheCssJsClass\PevCacheCssJsClass;

class PevCacheCssJsProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PevCacheCssJsClass', function ($app) {
            return new PevCacheCssJsClass();
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
