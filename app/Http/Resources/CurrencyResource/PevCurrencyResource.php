<?php

namespace App\Http\Resources\CurrencyResource;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Facade\CurrencyFacade\PevCurrencyFacade;

class PevCurrencyResource extends JsonResource
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
       $resp = PevCurrencyFacade::ValidarSQL($array);
        if($resp == null){
                
            return [
                'id' => $this->id,
                'name' => $this->name,
                'iso_code' => $this->iso_code,
                'conversion_rate' => $this->conversion_rate,
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
