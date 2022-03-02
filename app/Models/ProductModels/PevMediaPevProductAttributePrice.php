<?php

namespace App\Models\ProductModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevMediaPevProductAttributePrice extends Model
{
    use HasFactory;

    protected $table = 'pev_media_pev_product_attribute_prices';

    protected $fillable = [
        'pev_media_id',
        'pev_att_price_id',
        'principal'
    ];

    public function Media()
    {
        return $this->belongsTo('App\Models\FileModels\PevMedia', 'pev_media_id');
    }

    public function ProductAttributePrice()
    {
        return $this->belongsTo(PevProductAttributePrice::class, 'pev_att_price_id');
    }
}
