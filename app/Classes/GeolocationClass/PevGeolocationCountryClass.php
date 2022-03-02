<?php

namespace App\Classes\GeolocationClass;

use App\Models\GeolocationModels\PevGeolocationCountry;

use App\Classes\BaseRepositorio\BaseRepositorioClass;

class PevGeolocationCountryClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevGeolocationCountry;
    }
}