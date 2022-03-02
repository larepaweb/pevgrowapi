<?php

namespace App\Http\Resources\LangResource;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PevLangResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
