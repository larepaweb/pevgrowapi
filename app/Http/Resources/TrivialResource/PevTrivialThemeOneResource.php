<?php

namespace App\Http\Resources\TrivialResource;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Facade\TrivialFacade\PevTrivialThemeFacade;

class PevTrivialThemeOneResource extends JsonResource
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
       $resp = PevTrivialThemeFacade::ValidarSQL($array);
        if($resp == null){

        return [
            'id' => $this->id,
            'active' => $this->active,
            'deleted' => $this->deleted,
            'created_at' => $action = empty($this->created_at) ? '' : $this->created_at->format('d-m-Y'),
            'updated_at' => $action = empty($this->updated_at) ? '' : $this->updated_at->format('d-m-Y'),
            'theme_langs' => PevTrivialThemeLangResource::collection($this->TrivialThemeLang),
            //'trivial_question' => PevTrivialQuestionLangResource::collection($this->TrivialQuestionLang->where('pev_lang_id', $this->por_idioma)),

        ];
    }else {
        return $resp;
    }
    }
}
