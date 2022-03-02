<?php

namespace App\Classes\ZonePaisProvinciaClass;

use App\Models\ZonePaisProvinciaModels\PevCountry;

use App\Classes\BaseRepositorio\BaseRepositorioClass;

class PevCountryClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevCountry;
    }

}