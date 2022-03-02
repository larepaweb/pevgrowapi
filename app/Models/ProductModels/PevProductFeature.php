<?php

namespace App\Models\ProductModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevProductFeature extends Model
{
    use HasFactory;

    protected $table = 'pev_product_features';

    protected $fillable = [
        'position',
        'deleted',
    ];

    public function ProductFeatureLang()
    {
        return $this->hasMany(PevProductFeatureLang::class, 'pev_product_feature_id');
    }
}
