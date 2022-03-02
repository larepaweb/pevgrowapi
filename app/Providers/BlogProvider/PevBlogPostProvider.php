<?php

namespace App\Providers\BlogProvider;

use Illuminate\Support\ServiceProvider;
use App\Classes\BlogClass\PevBlogPostClass;

class PevBlogPostProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PevBlogPostClass', function ($app) {
            return new PevBlogPostClass();
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
