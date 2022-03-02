<?php

namespace App\Models\ProductModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevProductFeatureValue extends Model
{
    use HasFactory;

    protected $table = 'pev_product_feature_values';

    protected $fillable = [
        'pev_product_feature_id',
        'position',
        'custom',
        'deleted',
    ];

    public function FeatureValueLang()
    {
        return $this->hasMany(PevProductFeatureValueLang::class, 'pev_prod_feat_val_id');
    }
}
