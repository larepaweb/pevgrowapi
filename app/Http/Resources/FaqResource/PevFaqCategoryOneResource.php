<?php

namespace App\Http\Resources\FaqResource;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Facade\FaqFacade\PevFaqCategoryFacade;

class PevFaqCategoryOneResource extends JsonResource
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
        $resp = PevFaqCategoryFacade::ValidarSQL($array);
        if($resp == null){
            return [
                'id' => $this->id,
                'active' => $this->active,
                'position' => $this->position,
                'deleted' => $this->deleted,
                'created_at' => $this->created_at->format('d-m-Y'),
                'updated_at' => $this->updated_at->format('d-m-Y'),
                'faq_category_lang' => PevFaqCategoryLangResource::Collection($this->FaqCategoryLang),
                // 'all_faq_lang' => $this->FaqLang,
            ];
        }else {
            return $resp;
        }
    }
}
