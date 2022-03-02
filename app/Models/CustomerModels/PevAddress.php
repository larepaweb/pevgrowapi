<?php

namespace App\Models\CustomerModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevAddress extends Model
{
    use HasFactory;

    protected $table = 'pev_addresses';

    protected $fillable = [
        'pev_customer_id',
        'pev_country_id',
        'pev_state_id',	
        'default',
        'alias',	
        'company',
        'lastname',
        'firstname',
        'address1',
        'address2',
        'postcode',
        'city',
        'other',
        'phone',
        'phone_mobile',
        'vat_number',
        'dni',
        'active',
        'deleted',
    ];

    public function Customer()
    {
        return $this->hasMany(PevCustomer::class, 'pev_customer_group_id');
    }
}
