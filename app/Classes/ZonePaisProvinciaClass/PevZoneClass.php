<?php

namespace App\Classes\ZonePaisProvinciaClass;

use App\Models\ZonePaisProvinciaModels\PevZone;

use App\Classes\BaseRepositorio\BaseRepositorioClass;

class PevZoneClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevZone;
    }

}