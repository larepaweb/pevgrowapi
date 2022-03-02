<?php

namespace App\Classes\FaqsClass;

use App\Models\FaqModels\PevFaq;
use App\Classes\BaseRepositorio\BaseRepositorioClass;

class PevFaqClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevFaq;
    }
}
