<?php

namespace App\Classes\TrivialClass;

use App\Models\TrivialModels\PevTrivialTheme;

use App\Classes\BaseRepositorio\BaseRepositorioClass;

class PevTrivialThemeClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevTrivialTheme;
    }

    // public function prueba($data)
    // {
    //     return $data;
    // }
}