<?php

namespace App\Models\ProductModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevProductAttributePrice extends Model
{
    use HasFactory;

    protected $table = 'pev_product_attribute_prices';

    protected $fillable = [  
        'pev_product_id',
        'reference',
        'ean13',
        'isbn',
        'upc',
        'price',
        'ecotax',
        'quantity',
        'weight',
        'unit_price_impact',
        'minimal_quantity',
        'default_on',
        'available_date',
        'active',
        'deleted',
    ];

    public function CategoryLang()
    {
        return $this->hasMany(PevProductCategoryLang::class);
    }

    public function AttributesCombination()
    {
        return $this->belongsToMany(PevProductAttribute::class, 'pev_product_attribute_combination', 'pev_att_price_id', 'pev_prod_att_id');
    }
}
