<?php

namespace App\Facade\CarrierFacade;

use Illuminate\Support\Facades\Facade;

class PevCarrierShippingCostFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PevCarrierShippingCostClass';
    }
}