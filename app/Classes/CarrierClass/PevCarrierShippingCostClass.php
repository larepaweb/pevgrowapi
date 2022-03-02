<?php

namespace App\Classes\CarrierClass;

use App\Models\CarrierModels\PevCarrierShippingCost;
use App\Classes\BaseRepositorio\BaseRepositorioClass;

class PevCarrierShippingCostClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevCarrierShippingCost;
    }
}