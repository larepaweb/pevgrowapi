<?php

namespace App\Facade\ProductFacade;

use Illuminate\Support\Facades\Facade;

class PevProductFeatureLangFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevProductFeatureLangClass';
    }
}