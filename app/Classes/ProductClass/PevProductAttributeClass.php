<?php

namespace App\Classes\ProductClass;

use App\Models\ProductModels\PevProductAttribute;

use App\Classes\BaseRepositorio\BaseRepositorioClass;

class PevProductAttributeClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevProductAttribute;
    }

    // public function prueba($data)
    // {
    //     return $data;
    // }
}