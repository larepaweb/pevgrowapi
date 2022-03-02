<?php

namespace App\Classes\AliasClass;

use App\Models\AliasModels\PevAlias;

use App\Classes\BaseRepositorio\BaseRepositorioClass;

class PevAliasClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevAlias;
    }

    // public function prueba($data)
    // {
    //     return $data;
    // }
}