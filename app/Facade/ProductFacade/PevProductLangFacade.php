<?php

namespace App\Facade\ProductFacade;

use Illuminate\Support\Facades\Facade;

class PevProductLangFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevProductLangClass';
    }
}