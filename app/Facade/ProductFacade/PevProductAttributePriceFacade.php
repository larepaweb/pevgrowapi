<?php

namespace App\Facade\ProductFacade;

use Illuminate\Support\Facades\Facade;

class PevProductAttributePriceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevProductAttributePriceClass';
    }
}