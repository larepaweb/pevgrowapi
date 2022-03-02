<?php

namespace App\Facade\ProductFacade;

use Illuminate\Support\Facades\Facade;

class PevProductAttributeLangFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevProductAttributeLangClass';
    }
}