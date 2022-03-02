<?php

namespace App\Http\Resources\ProductResource;

use Illuminate\Http\Resources\Json\JsonResource;

class PevCategorySeedfinderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       
        return [
            'id' => $this->id,
            'pev_category_fem_id' => $this->pev_category_fem_id,
            'pev_category_auto_id' => $this->pev_category_auto_id,
            'pev_category_reg_id' => $this->pev_category_reg_id,
            'pev_category_cbd_id' => $this->pev_category_cbd_id,
            'seedfinder' => $this->seedfinder,
            'deleted' =>$this->deleted,
            'created_at' => $this->created_at->format('d-m-Y'),
            'updated_at' => $this->updated_at->format('d-m-Y'),
            'fem' => $resultado =   empty($this->PevCategoryFem->CategoryLang) ? null   :$this->PevCategoryFem->CategoryLang,
            'auto' => $resultado2 = empty($this->PevCategoryAuto->CategoryLang) ? null  :$this->PevCategoryAuto->CategoryLang->where('pev_lang_id', 1)->first()->name,
            'reg' => $resultado3 =  empty($this->PevCategoryReg->CategoryLang) ? null   :$this->PevCategoryReg->CategoryLang->where('pev_lang_id', 1)->first()->name,
            'cbd' => $resultado4 =  empty($this->PevCategoryCbd->CategoryLang) ? null   :$this->PevCategoryCbd->CategoryLang->where('pev_lang_id', 1)->first()->name,
        ];
    }
}
