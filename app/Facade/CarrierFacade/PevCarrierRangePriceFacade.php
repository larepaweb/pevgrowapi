<?php

namespace App\Facade\CarrierFacade;

use Illuminate\Support\Facades\Facade;

class PevCarrierRangePriceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevCarrierRangePriceClass';
    }
}