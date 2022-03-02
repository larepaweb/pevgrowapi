<?php

namespace App\Models\CarrierModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevCarrierShippingCost extends Model
{
    use HasFactory;

    protected $table = 'pev_carrier_shipping_costs';

    protected $fillable = [
        'pev_carrier_id',
        'pev_carrier_range_price_id',
        'pev_carrier_range_weight_id',
        'pev_zone_id',
        'price',
        'deleted',
    ];

    public function Carrier()
    {
        return $this->belongsTo(PevCarrier::class, 'pev_carrier_id');
    }
    public function CarrierRangePrice()
    {
        return $this->belongsTo(PevCarrierRangePrice::class, 'pev_carrier_range_price_id');
    }
    public function CarrierRangeWeight()
    {
        return $this->belongsTo(PevCarrierRangeWeight::class, 'pev_carrier_range_weight_id');
    }
    public function Zone()
    {
        return $this->belongsTo('App\Models\ZonePaisProvinciaModels\PevZone', 'pev_zone_id');
    }
}
