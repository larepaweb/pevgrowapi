<?php

namespace App\Classes\ProductClass;

use App\Models\ProductModels\PevProductAttributeGroup;

use App\Classes\BaseRepositorio\BaseRepositorioClass;

class PevProductAttributeGroupClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevProductAttributeGroup;
    }

    // public function prueba($data)
    // {
    //     return $data;
    // }
}

