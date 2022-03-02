<?php

namespace App\Models\ProductModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevProductCategoryComment extends Model
{
    use HasFactory;

    protected $table = 'pev_product_category_comments';

    protected $fillable = [

        'pev_product_category_id',
        'pev_customer_id',
        'type',
        'grade',
        'image',
        'active',
        'ip',
        'deleted',
    ];

    public function CategoryCommentLang()
    {
        return $this->hasMany(PevProductCategoryCommentLang::class, 'pev_prodcatcomment_id');
    }

    public function ProductCategory()
    {
        return $this->belongsTo(PevProductCategory::class, 'pev_product_category_id');
    }
}
