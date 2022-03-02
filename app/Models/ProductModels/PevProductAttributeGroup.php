<?php

namespace App\Models\ProductModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevProductAttributeGroup extends Model
{
    use HasFactory;

    protected $table = 'pev_product_attribute_groups';

    protected $fillable = [
        'is_color_group',
        'group_type',
        'position',
        'deleted',
    ];

    public function AttributeGroupLang()
    {
        return $this->hasMany(PevProductAttributeGroupLang::class, 'pev_prod_att_group_id');
    }
}
