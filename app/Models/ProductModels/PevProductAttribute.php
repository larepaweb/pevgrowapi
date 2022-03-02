<?php

namespace App\Models\ProductModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevProductAttribute extends Model
{
    use HasFactory;

    protected $table = 'pev_product_attributes';

    protected $fillable = [
        'pev_prod_att_group_id',
        'position',
        'deleted',
    ];

    public function AttributeLang()
    {
        return $this->hasMany(PevProductAttributeLang::class, 'pev_product_attribute_id');
    }

    public function AttributeGroup()
    {
        return $this->belongsTo(PevProductAttributeGroup::class, 'pev_prod_att_group_id');
    }

    // public function AttributeGroupLang()
    // {
    //     return $this->hasManyThrough(PevProductAttributeGroupLang::class, PevProductAttributeGroup::class, 'pev_trivial_theme_id', 'pev_trivial_question_id');
    // }
}
