<?php

namespace App\Models\CustomerModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevCustomerGroup extends Model
{
    use HasFactory;

    protected $table = 'pev_customer_groups';

    protected $fillable = [
        'active',
        'deleted',
    ];

    public function CustomerGroupLang()
    {
        return $this->hasMany(PevCustomerGroupLang::class, 'pev_customer_group_id');
    }
}
