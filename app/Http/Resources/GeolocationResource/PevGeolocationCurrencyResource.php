<?php

namespace App\Http\Resources\GeolocationResource;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Facade\GeolocationFacade\PevGeolocationCurrencyFacade;

class PevGeolocationCurrencyResource extends JsonResource
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
       $resp = PevGeolocationCurrencyFacade::ValidarSQL($array);
        if($resp == null){

            return [
                'id' => $this->id,
                'pev_country_id' => $this->pev_country_id,
                'pev_currency_id' => $this->pev_currency_id,
                'deleted' => $this->deleted,
                'created_at' => $this->created_at->format('d-m-Y'),
                'updated_at' => $this->updated_at->format('d-m-Y'), 
                //'blog_category_lang' => PevBlogCategoryLangResource::Collection($this->BlogCategoryLang),
            ];
        }else {
           return $resp;
        }
    }
}
