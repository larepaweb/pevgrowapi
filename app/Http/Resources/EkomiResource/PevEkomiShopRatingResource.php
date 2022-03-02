<?php

namespace App\Http\Resources\EkomiResource;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Facade\EkomiFacade\PevEkomiShopRatingFacade;

class PevEkomiShopRatingResource extends JsonResource
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
       $resp = PevEkomiShopRatingFacade::ValidarSQL($array);
        if($resp == null){
                
            return [
                'id' => $this->id,
                'pev_lang_id' => $this->pev_lang_id,
                'number_of_ratings' => $this->number_of_ratings,
                'exact_average' => $this->exact_average,
                'rounded_average' => $this->rounded_average,
                'seal' => $this->seal,
                'deleted' => $this->deleted,
                'created_at' => $action = empty($this->created_at) ? '' : $this->created_at->format('d-m-Y'),
                'updated_at' => $action = empty($this->updated_at) ? '' : $this->updated_at->format('d-m-Y'),
                // 'more' => $this->FaqLang,
            ];
        }else {
            return $resp;
        }
    }
}
