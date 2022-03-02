<?php

namespace App\Http\Resources\RedirectionResource;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PevRedirectionResourceCollection extends ResourceCollection
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
