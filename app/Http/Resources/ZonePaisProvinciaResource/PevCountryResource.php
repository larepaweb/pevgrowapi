<?php

namespace App\Http\Resources\ZonePaisProvinciaResource;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Facade\ZonePaisProvinciaFacade\PevCountryFacade;

class PevCountryResource extends JsonResource
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
       $resp = PevCountryFacade::ValidarSQL($array);
        if($resp == null){
                
            return [
                'id' => $this->id,
                'pev_zone_id' => $this->pev_zone_id,
                'pev_currency_id' => $this->pev_currency_id,
                'iso_code' => $this->iso_code,
                'call_prefix' => $this->call_prefix,
                'active' => $this->active,
                'contains_states' => $this->contains_states,
                'need_identification_number' => $this->need_identification_number,
                'need_zip_code' => $this->need_zip_code,
                'zip_code_format' => $this->zip_code_format,
                'display_tax_label' => $this->display_tax_label,
                'deleted' => $this->deleted,
                'created_at' => $action = empty($this->created_at) ? '' : $this->created_at->format('d-m-Y'),
                'updated_at' => $action = empty($this->updated_at) ? '' : $this->updated_at->format('d-m-Y'),
            ];
        }else {
            return $resp;
        }
    }
}
