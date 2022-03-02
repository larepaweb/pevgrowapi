<?php

namespace App\Http\Resources\HomePersonalizadaResource;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Facade\HomePersonalizadaFacade\PevProductVisitedFacade;

class PevProductVisitedResource extends JsonResource
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
       $resp = PevProductVisitedFacade::ValidarSQL($array);
        if($resp == null){
            return [
                'id' => $this->id,
                'pev_customer_id' => $this->pev_customer_id,
                'pev_product_id' => $this->pev_product_id,
                'visited_num' => $this->visited_num,
                'date_last_visited' => $this->date_last_visited,
                'deleted' => $this->deleted,
                'created_at' => $action = empty($this->created_at) ? '' : $this->created_at->format('d-m-Y'),
                'updated_at' => $action = empty($this->updated_at) ? '' : $this->updated_at->format('d-m-Y'),
            ];
        }else {
            return $resp;
        }
    }
}
