<?php

namespace App\Models\ProductModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevProductComment extends Model
{
    use HasFactory; 								

    protected $table = 'pev_product_comments';

    protected $fillable = [
        'pev_product_id',
        'pev_customer_id',
        'type',
        'grade',
        'image',
        'active',
        'ip',
        'ekomi',
        'deleted',
    ];
    public function ProductLang()
    {
        return $this->hasMany(PevProductLang::class, 'pev_product_id');
    }
}
