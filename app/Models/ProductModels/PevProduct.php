<?php

namespace App\Models\ProductModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevProduct extends Model
{
    use HasFactory;

    protected $table = 'pev_products';

    protected $fillable = [
        'pev_product_category_id',
        'pev_tax_rule_group_id',
        'ean13',
        'isbn',
        'upc',
        'price',
        'reference',
        'width',
        'height',
        'depth',
        'weight',
        'active',
        'available_for_order',
        'show_price',
        'description_num_columns',
        'deleted'
    ];
    public function ProductLang()
    {
        return $this->hasMany(PevProductLang::class, 'pev_product_id');
    }

}
