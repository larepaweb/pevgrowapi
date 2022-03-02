<?php

namespace App\Models\CarrierModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevCarrierRangePrice extends Model
{
    use HasFactory;

    protected $table = 'pev_carrier_range_prices';

    protected $fillable = [
        'pev_carrier_id',
        'delimiter1',
        'delimiter2',
        'deleted',
    ];

    public function Carrier()
    {
        return $this->belongsTo(PevCarrier::class, 'pev_carrier_id');
    }
}
