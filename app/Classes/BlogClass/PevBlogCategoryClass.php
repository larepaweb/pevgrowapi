<?php

namespace App\Classes\BlogClass;

use App\Models\BlogModels\PevBlogCategory;
use App\Classes\BaseRepositorio\BaseRepositorioClass;

class PevBlogCategoryClass extends BaseRepositorioClass
{
    public function getModel()
    {
        return new PevBlogCategory;
    }
}