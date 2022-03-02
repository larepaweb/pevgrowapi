<?php

namespace App\Http\Resources\ProductResource;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Facade\ProductFacade\PevProductFeatureValueFacade;

class PevProductFeatureValueOneResource extends JsonResource
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
       $resp = PevProductFeatureValueFacade::ValidarSQL($array);
        if($resp == null){
                
            return [
                'id' => $this->id,
                'pev_product_feature_id' => $this->pev_product_feature_id,
                'custom' => $this->custom,
                'position' => $this->position,
                'deleted' => $this->deleted,
                'created_at' => $this->created_at->format('d-m-Y'),
                'updated_at' => $this->updated_at->format('d-m-Y'),
                'feature_value_lang' => PevProductFeatureValueLangResource::collection($this->FeatureValueLang),
            ];
        }else {
            return $resp;
        }
    }
}
