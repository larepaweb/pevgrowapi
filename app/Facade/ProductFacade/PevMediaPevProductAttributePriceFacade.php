<?php

namespace App\Facade\ProductFacade;

use Illuminate\Support\Facades\Facade;

class PevMediaPevProductAttributePriceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevMediaPevProductAttributePriceClass';
    }
}