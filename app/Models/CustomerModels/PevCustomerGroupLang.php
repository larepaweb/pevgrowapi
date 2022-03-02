<?php

namespace App\Models\CustomerModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevCustomerGroupLang extends Model
{
    use HasFactory; 			

    protected $table = 'pev_customer_group_langs';

    protected $fillable = [
        'pev_customer_group_id',
        'pev_lang_id',
        'name',
        'active_lang',
    ];

    public function CustomerGroup()
    {
        return $this->belongsTo(PevCustomerGroup::class, 'pev_customer_group_id');
    }

    public function PevLang()
    {
        return $this->belongsTo('App\Models\LangModels\PevLang', 'pev_lang_id');
    }
}
