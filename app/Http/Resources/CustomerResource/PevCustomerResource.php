<?php

namespace App\Http\Resources\CustomerResource;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Facade\CustomerFacade\PevCustomerFacade;

class PevCustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $array = [
            'deleted' => $this->deleted,
        ];
       $resp = PevCustomerFacade::ValidarSQL($array);
        if($resp == null){

        return [      
            'id' => $this->id,          
            'pev_customer_group_id' => $this->pev_customer_group_id,
            'pev_lang_id' => $this->pev_lang_id,
            'company' => $this->company,
            'siret' => $this->siret,
            'ape' => $this->ape,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'email_verified_at' => $this->email_verified_at,
            'password' => $this->password,
            'last_passwd_gen' => $this->last_passwd_gen,
            'birthday' => $this->birthday,
            'newsletter' => $this->newsletter,
            'ip_registration_newsletter' => $this->ip_registration_newsletter,
            'newsletter_date_add' => $this->newsletter_date_add,
            'secure_key' => $this->secure_key,
            'note' => $this->note,
            'active' => $this->active,
            'is_guest' => $this->is_guest,
            'deleted' => $this->deleted,
            // 'remember_token' => $this->remember_token,
            'created_at' => $action = empty($this->created_at) ? '' : $this->created_at->format('d-m-Y'),
            'updated_at' => $action = empty($this->updated_at) ? '' : $this->updated_at->format('d-m-Y'),

        ];
    }else {
        return $resp;
    }
    }
}
