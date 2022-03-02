<?php

namespace App\Http\Resources\LangResource;

use Illuminate\Http\Resources\Json\JsonResource;

class PevLangResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if (empty($this->created_at)) {
            $fecha_creacio = '';
        } else {
            $fecha_creacio = $this->created_at->format('d-m-Y');
        }

        if (empty($this->updated_at)) {
            $fecha_actualizacion = '';
        } else {
            $fecha_actualizacion = $this->updated_at->format('d-m-Y');
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'active' => $this->active,
            'language_code' => $this->language_code,
            'locale' => $this->locale,
            'date_format_lite' => $this->date_format_lite,
            'date_format_full' => $this->date_format_full,
            'iso_code' => $this->iso_code,
            'is_rtl' => $this->is_rtl,
            'created_at' => $fecha_creacio,
            'updated_at' => $fecha_actualizacion,
        ];
    }
}
