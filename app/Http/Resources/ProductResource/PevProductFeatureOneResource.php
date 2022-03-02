<?php

namespace App\Http\Resources\ProductResource;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Facade\ProductFacade\PevProductFeatureFacade;

class PevProductFeatureOneResource extends JsonResource
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
       $resp = PevProductFeatureFacade::ValidarSQL($array);
        if($resp == null){
                
            return [
                'id' => $this->id,
                'position' => $this->position,
                'deleted' => $this->deleted,
                'created_at' => $action = empty($this->created_at) ? '' : $this->created_at->format('d-m-Y'),
                'updated_at' => $action = empty($this->updated_at) ? '' : $this->updated_at->format('d-m-Y'),

                'feature_lang' => PevProductFeatureLangResource::collection($this->ProductFeatureLang),
            ];
        }else {
            return $resp;
        }
    }
}
