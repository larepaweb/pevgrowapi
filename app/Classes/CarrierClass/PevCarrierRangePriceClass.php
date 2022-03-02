<?php

namespace App\Classes\CarrierClass;

use App\Models\CarrierModels\PevCarrierRangePrice;
use App\Classes\BaseRepositorio\BaseRepositorioClass;

class PevCarrierRangePriceClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevCarrierRangePrice;
    }
}