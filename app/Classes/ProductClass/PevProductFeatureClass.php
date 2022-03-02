<?php

namespace App\Classes\ProductClass;

use App\Models\ProductModels\PevProductFeature;

use App\Classes\BaseRepositorio\BaseRepositorioClass;

class PevProductFeatureClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevProductFeature;
    }

    // public function prueba($data)
    // {
    //     return $data;
    // }
}