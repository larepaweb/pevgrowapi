<?php

namespace App\Http\Resources\FaqResource;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Facade\FaqFacade\PevFaqFacade;

class PevFaqResource extends JsonResource
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
       $resp = PevFaqFacade::ValidarSQL($array);
        if($resp == null){
            return [
                'id' => $this->id,
                'pev_faq_category_id' => $this->pev_faq_category_id,
                'active' => $this->active,
                'position' => $this->position,
                'deleted' => $this->deleted,
                'created_at' => $this->created_at->format('d-m-Y'),
                'updated_at' => $this->updated_at->format('d-m-Y'),
                //'faq_lang' => PevFaqLangResource::Collection($this->FaqLang),
            ];
    
        }else {
          return $resp;
        }
    }
}
