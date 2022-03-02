<?php

namespace App\Models\ProductModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevProductCategoryLang extends Model
{
    use HasFactory;

    protected $table = 'pev_product_category_langs';

    protected $fillable = [
        'pev_product_category_id',
        'pev_lang_id',
        'name',
        'text_short',
        'text',
        'url',
        'image',
        'meta_title',
        'meta_description',
        'noindex',
        'active_lang'
    ];

    public function ProductCategory()
    {
        return $this->belongsTo(PevProductCategory::class, 'pev_product_category_id');
    }

    public function PevLang()
    {
        return $this->belongsTo('App\Models\LangModels\PevLang', 'pev_lang_id');
    }
}
