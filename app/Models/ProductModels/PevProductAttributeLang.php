<?php

namespace App\Models\ProductModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevProductAttributeLang extends Model
{
    use HasFactory;

    protected $table = 'pev_product_attribute_langs';

    protected $fillable = [
        'pev_product_attribute_id',
        'pev_lang_id',
        'name',
    ];

    public function Attribute()
    {
        return $this->belongsTo(PevProductAttribute::class, 'pev_product_attribute_id');
    }

    public function PevLang()
    {
        return $this->belongsTo('App\Models\LangModels\PevLang', 'pev_lang_id');
    }
}
