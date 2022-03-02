<?php

namespace App\Http\Resources\RedirectionResource;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Facade\RedirectionFacade\PevRedirectionFacade;

class PevRedirectionResource extends JsonResource
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
        $resp = PevRedirectionFacade::ValidarSQL($array);
        if($resp == null){
                
            return [
                'id' => $this->id,
                'url_old' => $this->url_old,
                'url_new' => $this->url_new,
                'redirect_type' => $this->redirect_type,
                'seedfinder' => $this->seedfinder,
                'deleted' => $this->deleted,
                'created_at' => $this->created_at->format('d-m-Y'),
                'updated_at' => $this->updated_at->format('d-m-Y'),
            ];
        }else {
            return $resp;
        }
    }
}
