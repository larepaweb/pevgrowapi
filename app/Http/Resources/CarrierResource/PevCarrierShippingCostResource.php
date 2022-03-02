<?php

namespace App\Http\Resources\CarrierResource;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Facade\CarrierFacade\PevCarrierShippingCostFacade;

class PevCarrierShippingCostResource extends JsonResource
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
       $resp = PevCarrierShippingCostFacade::ValidarSQL($array);
        if($resp == null){
                
            return [
                'id' => $this->id,
                'pev_carrier_id' => $this->pev_carrier_id,
                'carrier_name' => $this->Carrier->name,
                'pev_carrier_range_price_id' => $this->pev_carrier_range_price_id,
                'range_price' =>[
                    'delimiter1' => $action = empty($this->CarrierRangePrice->delimiter1) ? null : $this->CarrierRangePrice->delimiter1,
                    'delimiter2' => $action = empty($this->CarrierRangePrice->delimiter2) ? null : $this->CarrierRangePrice->delimiter2,
                ],
                'pev_carrier_range_weight_id' => $this->pev_carrier_range_weight_id,
                'range_weight' =>[
                    'delimiter1' => $action = empty($this->CarrierRangeWeight->delimiter1) ? null : $this->CarrierRangeWeight->delimiter1,
                    'delimiter2' => $action = empty($this->CarrierRangeWeight->delimiter2) ? null : $this->CarrierRangeWeight->delimiter2,
                ],
                'pev_zone_id' => $this->pev_zone_id,
                'zone_name' => $this->Zone->name, 
                // 'zone' => [
                    // "id" => $this->Zone->id,
                   // "name" => $this->Zone->name,
                    // "active" => $this->Zone->active,
                    // "deleted" => $this->Zone->deleted,
            // ],
                'price' => $this->price,
                'created_at' => $action = empty($this->created_at) ? '' : $this->created_at->format('d-m-Y'),
                'updated_at' => $action = empty($this->updated_at) ? '' : $this->updated_at->format('d-m-Y'),
            ];
        }else {
            return $resp;
        }
    }
}
