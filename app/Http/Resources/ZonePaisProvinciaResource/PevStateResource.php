<?php

namespace App\Http\Resources\ZonePaisProvinciaResource;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Facade\ZonePaisProvinciaFacade\PevStateFacade;

class PevStateResource extends JsonResource
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
       $resp = PevStateFacade::ValidarSQL($array);
        if($resp == null){
                
            return [
                'id' => $this->id,
                'pev_country_id' => $this->pev_country_id,
                'pev_zone_id' => $this->pev_zone_id,
                'zone_name' => $this->Zone->name,
                'name' => $this->name,
                'iso_code' => $this->iso_code,
                'active' => $this->active,
                'deleted' => $this->deleted,
                'created_at' => $action = empty($this->created_at) ? '' : $this->created_at->format('d-m-Y'),
                'updated_at' => $action = empty($this->updated_at) ? '' : $this->updated_at->format('d-m-Y'),
                'country' => $this->Country,
                
            ];
        }else {
            return $resp;
        }
    }
}
