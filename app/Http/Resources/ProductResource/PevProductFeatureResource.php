<?php

namespace App\Http\Resources\ProductResource;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Facade\ProductFacade\PevProductFeatureFacade;

class PevProductFeatureResource extends JsonResource
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
                    'value' => $this->id,
                    'lable' => $action = ($this->ProductFeatureLang->where('pev_lang_id', 1)->toArray() == null) ? 'SIN NOMBRE' : $this->ProductFeatureLang->where('pev_lang_id', 1)->toArray()[0]['name'],
                    'position' => $this->position,
                    'deleted' => $this->deleted,
                    'created_at' => $action = empty($this->created_at) ? '' : $this->created_at->format('d-m-Y'),
                    'updated_at' => $action = empty($this->updated_at) ? '' : $this->updated_at->format('d-m-Y'),
                ];
        }else {
            return $resp;
        }
    }
}
