<?php

namespace App\Facade\BlogFacade;

use Illuminate\Support\Facades\Facade;

class PevBlogCategoryLangFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevBlogCategoryLangClass';
    }
}