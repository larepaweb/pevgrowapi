<?php

namespace App\Classes\ProductClass;

use App\Models\ProductModels\PevProduct;

use App\Classes\BaseRepositorio\BaseRepositorioClass;

class PevProductClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevProduct;
    }

    // public function prueba($data)
    // {
    //     return $data;
    // }
}