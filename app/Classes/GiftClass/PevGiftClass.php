<?php

namespace App\Classes\GiftClass;

use App\Models\GiftModels\PevGift;

use App\Classes\BaseRepositorio\BaseRepositorioClass;

class PevGiftClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevGift;
    }

    // public function prueba($data)
    // {
    //     return $data;
    // }
}