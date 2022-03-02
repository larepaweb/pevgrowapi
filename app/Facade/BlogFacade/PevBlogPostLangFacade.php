<?php

namespace App\Facade\BlogFacade;

use Illuminate\Support\Facades\Facade;

class PevBlogPostLangFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevBlogPostLangClass';
    }
}