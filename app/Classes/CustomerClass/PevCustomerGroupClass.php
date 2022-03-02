<?php

namespace App\Classes\CustomerClass;

use App\Models\CustomerModels\PevCustomerGroup;

use App\Classes\BaseRepositorio\BaseRepositorioClass;

class PevCustomerGroupClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevCustomerGroup;
    }

    // public function prueba($data)
    // {
    //     return $data;
    // }
}