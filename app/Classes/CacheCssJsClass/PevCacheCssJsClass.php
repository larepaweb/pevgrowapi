<?php

namespace App\Classes\CacheCssJsClass;

use App\Classes\BaseRepositorio\BaseRepositorioClass;
use App\Models\CacheCssJsModels\PevCacheCssJs;

class PevCacheCssJsClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevCacheCssJs;
    }
}
