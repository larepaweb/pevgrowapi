<?php

namespace App\Classes\CarrierClass;

use App\Models\CarrierModels\PevCarrier;
use App\Classes\BaseRepositorio\BaseRepositorioClass;

class PevCarrierClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevCarrier;
    }
}