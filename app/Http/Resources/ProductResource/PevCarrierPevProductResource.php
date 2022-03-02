<?php

namespace App\Http\Resources\ProductResource;

use Illuminate\Http\Resources\Json\JsonResource;

class PevCarrierPevProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'pev_carrier_id' => $this->pev_carrier_id,
            'carrier_name' => $action = empty($this->pev_carrier_id) ? 'TODOS' : $this->Carrier->name,
            'pev_product_id' => $this->pev_product_id,
            'product_name' => $this->Product->ProductLang[0]->name,
            // 'principal' => $this->principal,
            'created_at' => $action = empty($this->created_at) ? '' : $this->created_at->format('d-m-Y'),
            'updated_at' => $action = empty($this->updated_at) ? '' : $this->updated_at->format('d-m-Y'),
        ]; 
    }
}
