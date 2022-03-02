<?php

namespace App\Classes\HomePersonalizadaClass;

use App\Models\HomePersonalizadaModels\PevCategoryVisited;

use App\Classes\BaseRepositorio\BaseRepositorioClass;

class PevCategoryVisitedClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevCategoryVisited;
    }

    // public function prueba($data)
    // {
    //     return $data;
    // }
}