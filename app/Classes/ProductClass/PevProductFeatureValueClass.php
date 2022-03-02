<?php

namespace App\Classes\ProductClass;

use App\Models\ProductModels\PevProductFeatureValue;

use App\Classes\BaseRepositorio\BaseRepositorioClass;

class PevProductFeatureValueClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevProductFeatureValue;
    }

    // public function prueba($data)
    // {
    //     return $data;
    // }
}