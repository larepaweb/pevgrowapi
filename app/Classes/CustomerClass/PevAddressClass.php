<?php

namespace App\Classes\CustomerClass;

use App\Models\CustomerModels\PevAddress;

use App\Classes\BaseRepositorio\BaseRepositorioClass;

class PevAddressClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevAddress;
    }

    // public function prueba($data)
    // {
    //     return $data;
    // }
}