<?php

namespace App\Facade\ProductFacade;

use Illuminate\Support\Facades\Facade;

class PevProductCommentLangFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevProductCommentLangClass';
    }
}