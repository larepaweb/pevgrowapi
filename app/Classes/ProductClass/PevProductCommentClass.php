<?php

namespace App\Classes\ProductClass;

use App\Models\ProductModels\PevProductComment;

use App\Classes\BaseRepositorio\BaseRepositorioClass;

class PevProductCommentClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevProductComment;
    }

    // public function prueba($data)
    // {
    //     return $data;
    // }
}