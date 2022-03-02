<?php

namespace App\Classes\FaqsClass;

use App\Models\FaqModels\PevFaqCategory;
use App\Classes\BaseRepositorio\BaseRepositorioClass;

class PevFaqCategoryClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevFaqCategory;
    }
}
