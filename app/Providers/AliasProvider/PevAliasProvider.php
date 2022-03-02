<?php

namespace App\Providers\AliasProvider;

use Illuminate\Support\ServiceProvider;
use App\Classes\AliasClass\PevAliasClass;

class PevAliasProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PevAliasClass', function ($app) {
            return new PevAliasClass();
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
