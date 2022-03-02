<?php

namespace App\Models\CarrierModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevCarrierLang extends Model
{
    use HasFactory;

    protected $table = 'pev_carrier_langs';

    protected $fillable = [
        'pev_carrier_id',
        'pev_lang_id',
        'name',
        'delay',
    ];

    public function Carrier()
    {
        return $this->belongsTo(PevCarrier::class, 'pev_carrier_id');
    }

    public function PevLang()
    {
        return $this->belongsTo('App\Models\LangModels\PevLang', 'pev_lang_id');
    }
}
