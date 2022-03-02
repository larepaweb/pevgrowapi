<?php

namespace App\Providers\BlogProvider;

use Illuminate\Support\ServiceProvider;
use App\Classes\BlogClass\PevBlogPostLangClass;

class PevBlogPostLangProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PevBlogPostLangClass', function ($app) {
            return new PevBlogPostLangClass();
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
