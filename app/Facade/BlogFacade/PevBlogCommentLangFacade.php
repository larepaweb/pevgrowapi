<?php

namespace App\Facade\BlogFacade;

use Illuminate\Support\Facades\Facade;

class PevBlogCommentLangFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevBlogCommentLangClass';
    }
}