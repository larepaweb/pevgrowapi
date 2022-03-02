<?php

namespace App\Classes\ProductClass;

use App\Models\ProductModels\PevProductAttributePrice;

use App\Classes\BaseRepositorio\BaseRepositorioClass;

class PevProductAttributePriceClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevProductAttributePrice;
    }

    // public function prueba($data)
    // {
    //     return $data;
    // }
}