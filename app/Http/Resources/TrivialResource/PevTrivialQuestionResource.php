<?php

namespace App\Http\Resources\TrivialResource;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Facade\TrivialFacade\PevTrivialQuestionFacade;

class PevTrivialQuestionResource extends JsonResource
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
       $resp = PevTrivialQuestionFacade::ValidarSQL($array);
        if($resp == null){
                
            return [
                'id' => $this->id,
                'pev_trivial_theme_id' => $this->pev_trivial_theme_id,
                'answer_true' => $this->answer_true,
                'active' => $this->active,
                'deleted' => $this->deleted,
                'created_at' => $action = empty($this->created_at) ? '' : $this->created_at->format('d-m-Y'),
                'updated_at' => $action = empty($this->updated_at) ? '' : $this->updated_at->format('d-m-Y'),
            ];
        }else {
            return $resp;
        }
    }
}
