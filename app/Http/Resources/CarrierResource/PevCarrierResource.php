<?php

namespace App\Http\Resources\CarrierResource;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Facade\CarrierFacade\PevCarrierFacade;

class PevCarrierResource extends JsonResource
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
       $resp = PevCarrierFacade::ValidarSQL($array);
        if($resp == null){
                
            return [

                'id' => $this->id,
                'reference_id' => $this->reference_id,
                'pev_tax_rules_group_id' => $this->pev_tax_rules_group_id,
                'pev_media_id' => $this->pev_media_id,
                'media_url' => explode(",", $this->Media->url),
                'name' => $this->name,
                'url' => $this->url,
                'range_behavior' => $this->range_behavior,
                'is_free' => $this->is_free,
                'need_range' => $this->need_range,
                'shipping_method' => $this->shipping_method,
                'position' => $this->position,
                'max_width' => $this->max_width,
                'max_height' => $this->max_height,
                'max_depth' => $this->max_depth,
                'max_weight' => $this->max_weight,
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
