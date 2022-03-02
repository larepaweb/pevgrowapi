<?php

namespace App\Classes\ProductClass;

use App\Models\ProductModels\PevProductCategory;

use App\Classes\BaseRepositorio\BaseRepositorioClass;

class PevProductCategoryClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevProductCategory;
    }

    // public function prueba($data)
    // {
    //     return $data;
    // }
}