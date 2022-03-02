<?php

namespace App\Models\ProductModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevFeatureValuePevProduct extends Model
{
    use HasFactory;

    protected $table = 'pev_feature_value_pev_products';

    protected $fillable = [
        'pev_prod_feat_val_id',
        'pev_product_id',
    
    ];

    public function FeatureValue()
    {
        return $this->belongsTo(PevProductFeatureValue::class, 'pev_prod_feat_val_id');
    }

    public function Product()
    {
        return $this->belongsTo(PevProduct::class, 'pev_product_id');
    }
}
