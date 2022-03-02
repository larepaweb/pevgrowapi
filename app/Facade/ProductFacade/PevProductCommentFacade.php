<?php

namespace App\Facade\ProductFacade;

use Illuminate\Support\Facades\Facade;

class PevProductCommentFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevProductCommentClass';
    }
}