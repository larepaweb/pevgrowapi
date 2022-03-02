<?php

namespace App\Http\Resources\GiftResource;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Facade\GiftFacade\PevGiftFacade;

class PevGiftResource extends JsonResource
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
       $resp = PevGiftFacade::ValidarSQL($array);
        if($resp == null){
            return [
                'id' => $this->id,
                'price_from' => $this->price_from,
                'price_to' => $this->price_to,
                'active' => $this->active,
                'deleted' => $this->deleted,
                'created_at' => $action = empty($this->created_at) ? '' : $this->created_at->format('d-m-Y'),
                'updated_at' => $action = empty($this->updated_at) ? '' : $this->updated_at->format('d-m-Y'),
                'products' => $this->Products,
            ];
        }else {
            return $resp;
        }
        
    }
}
