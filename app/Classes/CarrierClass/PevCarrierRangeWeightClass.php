<?php

namespace App\Classes\CarrierClass;

use App\Models\CarrierModels\PevCarrierRangeWeight;
use App\Classes\BaseRepositorio\BaseRepositorioClass;

class PevCarrierRangeWeightClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevCarrierRangeWeight;
    }
}