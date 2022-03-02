<?php

namespace App\Classes\CustomerClass;

use App\Models\CustomerModels\PevCustomer;

use App\Classes\BaseRepositorio\BaseRepositorioClass;

class PevCustomerClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevCustomer;
    }

    // public function prueba($data)
    // {
    //     return $data;
    // }
}