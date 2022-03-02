<?php

namespace App\Models\CustomerModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class PevCustomer extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'pev_customers';

    protected $fillable = [
        'pev_customer_group_id',
        'pev_lang_id',
        'company',
        'siret',
        'ape',
        'firstname',
        'lastname',
        'email',
        'email_verified_at',
        'password',
        'last_passwd_gen',
        'birthday',
        'newsletter',
        'ip_registration_newsletter',
        'newsletter_date_add',
        'secure_key',
        'note',
        'active',
        'is_guest',
        'deleted',
        'remember_token',
    ];

    public function CustomerGroup()
    {
        return $this->hasMany(PevCustomerGroup::class, 'pev_customer_group_id');
    }
}
