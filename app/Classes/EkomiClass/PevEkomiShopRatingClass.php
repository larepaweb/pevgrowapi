<?php

namespace App\Classes\EkomiClass;

use App\Models\EkomiModels\PevEkomiShopRating;

use App\Classes\BaseRepositorio\BaseRepositorioClass;

class PevEkomiShopRatingClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevEkomiShopRating;
    }

    // public function prueba($data)
    // {
    //     return $data;
    // }
}