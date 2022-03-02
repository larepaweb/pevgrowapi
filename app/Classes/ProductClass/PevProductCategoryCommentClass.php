<?php

namespace App\Classes\ProductClass;

use App\Models\ProductModels\PevProductCategoryComment;
use App\Classes\BaseRepositorio\BaseRepositorioClass;

class PevProductCategoryCommentClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevProductCategoryComment;
    }

    // public function prueba($data)
    // {
    //     return $data;
    // }
}