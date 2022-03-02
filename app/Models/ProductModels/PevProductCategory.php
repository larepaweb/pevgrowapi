<?php

namespace App\Models\ProductModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevProductCategory extends Model
{
    use HasFactory;

    protected $table = 'pev_product_categories';

    protected $fillable = [
        'pev_product_category_id_parent',
        'active',
        'important',
        'position',
        'deleted',
    ];

    public function CategoryLang()
    {
        return $this->hasMany(PevProductCategoryLang::class);
    }
}
