<?php

namespace App\Classes\WordsClass;

use App\Models\WordModels\PevWord;

use App\Classes\BaseRepositorio\BaseRepositorioClass;

class PevWordClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevWord;
    }

    // public function prueba($data)
    // {
    //     return $data;
    // }
}