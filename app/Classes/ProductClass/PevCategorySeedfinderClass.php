<?php

namespace App\Classes\ProductClass;

use App\Models\ProductModels\PevCategorySeedfinder;

use App\Classes\BaseRepositorio\BaseRepositorioClass;

class PevCategorySeedfinderClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevCategorySeedfinder;
    }

    // public function prueba($data)
    // {
    //     return $data;
    // }
}