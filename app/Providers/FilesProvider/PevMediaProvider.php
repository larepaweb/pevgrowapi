<?php

namespace App\Providers\FilesProvider;

use Illuminate\Support\ServiceProvider;
use App\Classes\FilesClass\PevMediaClass;

class PevMediaProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PevMediaClass', function ($app) {
            return new PevMediaClass();
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
