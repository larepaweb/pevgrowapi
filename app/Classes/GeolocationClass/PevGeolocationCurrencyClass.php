<?php

namespace App\Classes\GeolocationClass;

use App\Models\GeolocationModels\PevGeolocationCurrency;

use App\Classes\BaseRepositorio\BaseRepositorioClass;

class PevGeolocationCurrencyClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevGeolocationCurrency;
    }

    // public function prueba($data)
    // {
    //     return $data;
    // }
}