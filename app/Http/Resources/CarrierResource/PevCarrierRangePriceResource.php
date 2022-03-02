<?php

namespace App\Http\Resources\CarrierResource;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Facade\CarrierFacade\PevCarrierRangePriceFacade;

class PevCarrierRangePriceResource extends JsonResource
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
       $resp = PevCarrierRangePriceFacade::ValidarSQL($array);
        if($resp == null){
                
            return [

                'id' => $this->id,
                'pev_carrier_id' => $this->pev_carrier_id,
                'carrier_name' => $this->Carrier->name,
                'delimiter1' => $this->delimiter1,
                'delimiter2' => $this->delimiter2,
                'created_at' => $action = empty($this->created_at) ? '' : $this->created_at->format('d-m-Y'),
                'updated_at' => $action = empty($this->updated_at) ? '' : $this->updated_at->format('d-m-Y'),
            ];
        }else {
            return $resp;
        }
    }
}
