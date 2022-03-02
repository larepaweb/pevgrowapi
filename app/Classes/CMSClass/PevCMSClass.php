<?php

namespace App\Classes\CMSClass;

use App\Models\CMSModels\PevCms;

use App\Classes\BaseRepositorio\BaseRepositorioClass;

class PevCMSClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevCms;
    }

    // public function prueba($data)
    // {
    //     return $data;
    // }
}