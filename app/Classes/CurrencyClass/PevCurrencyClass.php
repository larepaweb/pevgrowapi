<?php

namespace App\Classes\CurrencyClass;

use App\Models\CurrencyModels\PevCurrency;
use App\Classes\BaseRepositorio\BaseRepositorioClass;

class PevCurrencyClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevCurrency;
    }
}