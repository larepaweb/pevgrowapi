<?php

namespace App\Classes\EkomiClass;

use App\Models\EkomiModels\PevEkomiOrder;

use App\Classes\BaseRepositorio\BaseRepositorioClass;

class PevEkomiOrderClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevEkomiOrder;
    }

    // public function prueba($data)
    // {
    //     return $data;
    // }
}