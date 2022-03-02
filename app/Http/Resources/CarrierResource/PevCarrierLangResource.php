<?php

namespace App\Http\Resources\CarrierResource;

use Illuminate\Http\Resources\Json\JsonResource;

class PevCarrierLangResource extends JsonResource
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
            'pev_lang_id' => $this->pev_lang_id,
            'iso_code' => strtoupper($this->PevLang->iso_code),
            'name_lang' => $this->PevLang->name,
            'name' => $this->name,
            'delay' => $this->delay,
            'deleted' => $this->Carrier->deleted,
            'created_at' => $action = empty($this->created_at) ? '' : $this->created_at->format('d-m-Y'),
            'updated_at' => $action = empty($this->updated_at) ? '' : $this->updated_at->format('d-m-Y'),
            'carrier' => $this->Carrier,
        ];
    }
}
