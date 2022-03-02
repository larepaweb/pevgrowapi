<?php

namespace App\Models\CarrierModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevCarrier extends Model
{
    use HasFactory;

    protected $table = 'pev_carriers';

    protected $fillable = [
        'reference_id',
        'pev_tax_rules_group_id',
        'pev_media_id',
        'name',
        'url',
        'range_behavior',
        'is_free',
        'need_range',
        'shipping_method',
        'position',
        'max_width',
        'max_height',
        'max_depth',
        'max_weight',
        'active',
        'deleted',
    ];

    public function Media()
    {
        return $this->belongsTo('App\Models\FileModels\PevMedia', 'pev_media_id');
    }

    public function CarrierLang()
    {
        return $this->hasMany(PevCarrierLang::class, 'pev_carrier_id');
    }

    public function ShippingCost()
    {
        return $this->hasMany(PevCarrierShippingCost::class, 'pev_carrier_id');
    }
}
