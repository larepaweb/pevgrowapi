<?php

namespace App\Models\ProductModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevMediaPevProduct extends Model
{
    use HasFactory;

    protected $table = 'pev_media_pev_product';

    protected $fillable = [
        'pev_media_id',
        'pev_product_id',
        'principal'
    ];

    public function Media()
    {
        return $this->belongsTo('App\Models\FileModels\PevMedia', 'pev_media_id');
    }

    public function Product()
    {
        return $this->belongsTo(PevProduct::class, 'pev_product_id');
    }
}
