<?php

namespace App\Classes\HomePersonalizadaClass;

use App\Models\HomePersonalizadaModels\PevProductVisited;

use App\Classes\BaseRepositorio\BaseRepositorioClass;

class PevProductVisitedClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevProductVisited;
    }

    // public function prueba($data)
    // {
    //     return $data;
    // }
}