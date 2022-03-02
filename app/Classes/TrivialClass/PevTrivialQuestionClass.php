<?php

namespace App\Classes\TrivialClass;

use App\Models\TrivialModels\PevTrivialQuestion;

use App\Classes\BaseRepositorio\BaseRepositorioClass;

class PevTrivialQuestionClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevTrivialQuestion;
    }

    // public function prueba($data)
    // {
    //     return $data;
    // }
}