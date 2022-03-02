<?php

namespace App\Http\Resources\CustomerResource;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Facade\CustomerFacade\PevAddressFacade;

class PevAddressResource extends JsonResource
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
       $resp = PevAddressFacade::ValidarSQL($array);
        if($resp == null){

        return [      
            'id' => $this->id,          
            'pev_customer_id' => $this->pev_customer_id,
            'pev_country_id' => $this->pev_country_id,
            'pev_state_id' => $this->pev_state_id,	
            'default' => $this->default,
            'alias' => $this->alias,	
            'company' => $this->company,
            'lastname' => $this->lastname,
            'firstname' => $this->firstname,
            'address1' => $this->address1,
            'address2' => $this->address2,
            'postcode' => $this->postcode,
            'city' => $this->city,
            'other' => $this->other,
            'phone' => $this->phone,
            'phone_mobile' => $this->phone_mobile,
            'vat_number' => $this->vat_number,
            'dni' => $this->dni,
            'active' => $this->active,
            'deleted' => $this->deleted,
            'created_at' => $action = empty($this->created_at) ? '' : $this->created_at->format('d-m-Y'),
            'updated_at' => $action = empty($this->updated_at) ? '' : $this->updated_at->format('d-m-Y'),

        ];
    }else {
        return $resp;
    }    
}
}
