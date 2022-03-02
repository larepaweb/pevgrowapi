<?php

namespace App\Http\Resources\ProductResource;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Facade\ProductFacade\PevProductFeatureValueFacade;

class PevProductFeatureValueResource extends JsonResource
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
                'value' => $this->id,
                'pev_product_feature_id' => $this->pev_product_feature_id,
                'lable' => $action = ($this->FeatureValueLang->where('pev_lang_id', 1)->toArray() == null) ? 'SIN NOMBRE' : $this->FeatureValueLang->where('pev_lang_id', 1)->toArray()[0]['value'],
                // 'lable' => $this->FeatureValueLang,
                // 'custom' => $this->custom,
                // 'position' => $this->position,
                // 'deleted' => $this->deleted,
                // 'created_at' => $this->created_at->format('d-m-Y'),
                // 'updated_at' => $this->updated_at->format('d-m-Y'),
            ];
        }else {
            return $resp;
        }
    }
}
