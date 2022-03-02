<?php

namespace App\Models\ProductModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevCarrierPevProduct extends Model
{
    use HasFactory;

    protected $table = 'pev_carrier_pev_products';

    protected $fillable = [
        'pev_carrier_id',
        'pev_product_id',
    
    ];

    public function Carrier()
    {
        return $this->belongsTo('App\Models\CarrierModels\PevCarrier', 'pev_carrier_id');
    }

    public function Product()
    {
        return $this->belongsTo(PevProduct::class, 'pev_product_id');
    }
}
