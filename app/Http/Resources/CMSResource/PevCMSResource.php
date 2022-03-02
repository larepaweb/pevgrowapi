<?php

namespace App\Http\Resources\CMSResource;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Facade\CMSFacade\PevCMSFacade;

class PevCMSResource extends JsonResource
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
       $resp = PevCMSFacade::ValidarSQL($array);
        if($resp == null){
            return [
                'id' => $this->id,
                'active' => $this->active,
                'position' => $this->position,
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
