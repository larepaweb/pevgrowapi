<?php

namespace App\Http\Resources\GeolocationResource;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Facade\GeolocationFacade\PevGeolocationCountryFacade;

class PevGeolocationCountryResource extends JsonResource
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
       $resp = PevGeolocationCountryFacade::ValidarSQL($array);
        if($resp == null){

            return [
                'id' => $this->id,
                'ipfrom' => $this->ipfrom,
                'ipto' => $this->ipto,
                'pev_country_id' => $this->pev_country_id,
                'country_isocode' => $this->Country->iso_code,
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
