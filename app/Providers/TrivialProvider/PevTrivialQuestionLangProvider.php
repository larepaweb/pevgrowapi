<?php

namespace App\Providers\TrivialProvider;

use Illuminate\Support\ServiceProvider;
use App\Classes\TrivialClass\PevTrivialQuestionLangClass;

class PevTrivialQuestionLangProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('PevTrivialQuestionLangClass', function ($app) {
            return new PevTrivialQuestionLangClass();
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
