<?php

namespace App\Models\ProductModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevProductFeatureLang extends Model
{
    use HasFactory;
    
    protected $table = 'pev_product_feature_langs';

    protected $fillable = [
        'pev_product_feature_id',
        'pev_lang_id',
        'name',
    ];

    public function ProductFeature()
    {
        return $this->belongsTo(PevProductFeature::class, 'pev_product_feature_id');
    }

    public function PevLang()
    {
        return $this->belongsTo('App\Models\LangModels\PevLang', 'pev_lang_id');
    }
}
