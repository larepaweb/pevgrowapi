<?php

namespace App\Classes\HomePersonalizadaClass;

use App\Models\HomePersonalizadaModels\PevBlogPostVisited;

use App\Classes\BaseRepositorio\BaseRepositorioClass;

class PevBlogPostVisitedClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevBlogPostVisited;
    }

    // public function prueba($data)
    // {
    //     return $data;
    // }
}