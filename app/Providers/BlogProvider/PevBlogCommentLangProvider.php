<?php

namespace App\Providers\BlogProvider;

use Illuminate\Support\ServiceProvider;
use App\Classes\BlogClass\PevBlogCommentLangClass;

class PevBlogCommentLangProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PevBlogCommentLangClass', function ($app) {
            return new PevBlogCommentLangClass();
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
