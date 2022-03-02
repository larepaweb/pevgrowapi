<?php

namespace App\Http\Resources\CustomerResource;

use Illuminate\Http\Resources\Json\JsonResource;

class PevCustomerGroupLangResource extends JsonResource
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
            'pev_customer_group_id' => $this->pev_customer_group_id,
            'pev_lang_id' => $this->pev_lang_id,
            'iso_code' => strtoupper($this->PevLang->iso_code),
            'name_lang' => $this->PevLang->name,
            'name' => $this->name,
            'active_lang' => $this->active_lang,
            'active' => $this->CustomerGroup->active,
            'deleted' => $this->CustomerGroup->deleted,
            'created_at' => $action = empty($this->created_at) ? '' : $this->created_at->format('d-m-Y'),
            'updated_at' => $action = empty($this->updated_at) ? '' : $this->updated_at->format('d-m-Y'),
            // 'more' => $this->FaqLang,
        ];
    }
}
