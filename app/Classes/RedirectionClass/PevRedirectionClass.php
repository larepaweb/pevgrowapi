<?php

namespace App\Classes\RedirectionClass;

use App\Models\RedirectModels\PevRedirection;

use App\Classes\BaseRepositorio\BaseRepositorioClass;

class PevRedirectionClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevRedirection;
    }

    // public function prueba($data)
    // {
    //     return $data;
    // }
}