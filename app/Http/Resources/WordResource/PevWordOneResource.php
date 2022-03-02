<?php

namespace App\Http\Resources\WordResource;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Facade\WordFacade\PevWordFacade;

class PevWordOneResource extends JsonResource
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
       $resp = PevWordFacade::ValidarSQL($array);
        if($resp == null){
                
            return [
                'id' => $this->id,
                'new' => $this->new,
                'active' => $this->active,
                'deleted' => $this->deleted,
                'created_at' => $action = empty($this->created_at) ? '' : $this->created_at->format('d-m-Y'),
                'updated_at' => $action = empty($this->updated_at) ? '' : $this->updated_at->format('d-m-Y'),
                'word_lang' => new PevWordLangResourceCollection($this->WordLang),
            ];
        }else {
            return $resp;
        }
    }
}
