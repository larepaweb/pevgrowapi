<?php

namespace App\Classes\LangsClass;

use App\Models\LangModels\PevLang;

use App\Classes\BaseRepositorio\BaseRepositorioClass;

class PevLangClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevLang;
    }

    // public function prueba($data)
    // {
    //     return $data;
    // }
}
