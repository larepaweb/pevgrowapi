<?php

namespace App\Models\GiftModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevGift extends Model
{
    use HasFactory;

    protected $table = 'pev_gifts';

    protected $fillable = [
        'price_from',
        'price_to',
        'active',
        'locale',
        'deleted',
    ];




    // public function Product()
    // {
    //     return $this->belongsTo('App\Models\ProductModels\PevProduct', 'pev_product_id');
    // }

    public function Products()
    {
        return $this->belongsToMany('App\Models\ProductModels\PevProduct', 'pev_gift_pev_product', 'pev_gift_id', 'pev_product_id');
    }
}
