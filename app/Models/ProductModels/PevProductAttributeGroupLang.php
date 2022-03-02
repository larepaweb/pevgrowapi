<?php

namespace App\Models\ProductModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevProductAttributeGroupLang extends Model
{
    use HasFactory;

    protected $table = 'pev_product_attribute_group_langs';

    protected $fillable = [
        'pev_prod_att_group_id',
        'pev_lang_id',
        'name',
    ];

    public function AttributeGroup()
    {
        return $this->belongsTo(PevProductAttributeGroup::class, 'pev_prod_att_group_id');
    }

    public function PevLang()
    {
        return $this->belongsTo('App\Models\LangModels\PevLang', 'pev_lang_id');
    }
}
