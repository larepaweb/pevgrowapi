<?php

namespace App\Models\HomePersonalizadaModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevProductVisited extends Model
{
    use HasFactory; 			

    protected $table = 'pev_product_visiteds';

    protected $fillable = [
        'pev_customer_id',
        'pev_product_id',
        'visited_num',
        'date_last_visited',
        'deleted',
    ];

    // public function CmsLang()
    // {
    //     return $this->hasMany(PevCmsLang::class, 'pev_cms_id');
    // }
}
