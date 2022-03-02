<?php

namespace App\Models\ProductModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevCategorySeedfinder extends Model
{
    use HasFactory; 					

    protected $table = 'pev_category_seedfinders';

    protected $fillable = [
        'pev_category_fem_id',
        'pev_category_auto_id',
        'pev_category_reg_id',
        'pev_category_cbd_id',
        'seedfinder',
        'deleted',
    ];

    public function PevCategoryFem()
    {
        return $this->belongsTo('App\Models\ProductModels\PevProductCategory', 'pev_category_fem_id');
    }
    public function PevCategoryAuto()
    {
        return $this->belongsTo('App\Models\ProductModels\PevProductCategory', 'pev_category_auto_id');
    }
    public function PevCategoryReg()
    {
        return $this->belongsTo('App\Models\ProductModels\PevProductCategory', 'pev_category_reg_id');
    }
    public function PevCategoryCbd()
    {
        return $this->belongsTo('App\Models\ProductModels\PevProductCategory', 'pev_category_cbd_id');
    }
    // public function deployments()
    // {
    //     return $this->hasManyThrough(PevProductCategory::class, PevProductCategoryLang::class);
    // }

    // public function PevCategoryFem()
    // {
    //     return $this->hasManyThrough('App\Models\ProductModels\PevProductCategoryLang', 'App\Models\ProductModels\PevProductCategory', 'pev_category_fem_id', 'pev_product_category_id');
    // }
}
