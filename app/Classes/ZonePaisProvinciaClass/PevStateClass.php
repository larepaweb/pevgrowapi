<?php

namespace App\Classes\ZonePaisProvinciaClass;

use App\Models\ZonePaisProvinciaModels\PevState;

use App\Classes\BaseRepositorio\BaseRepositorioClass;

class PevStateClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevState;
    }

}