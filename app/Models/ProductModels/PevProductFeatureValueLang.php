<?php

namespace App\Models\ProductModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevProductFeatureValueLang extends Model
{
    use HasFactory;

    protected $table = 'pev_product_feature_value_langs';

    protected $fillable = [
        'pev_prod_feat_val_id',
        'pev_lang_id',
        'value',
    ];

    public function FeatureValue()
    {
        return $this->belongsTo(PevProductFeatureValue::class, 'pev_prod_feat_val_id');
    }

    public function PevLang()
    {
        return $this->belongsTo('App\Models\LangModels\PevLang', 'pev_lang_id');
    }
}
