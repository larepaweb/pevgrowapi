<?php

namespace App\Http\Resources\FileResource;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Facade\FilesFacade\PevMediaFacade;

class PevMediaResource extends JsonResource
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
        $resp = PevMediaFacade::ValidarSQL($array);
        if($resp == null){

        return [
            'id' => $this->id,
            'pev_image_zone_id' => $this->pev_image_zone_id,
            // 'name_zone' => $this->ImageSize->ImageZone->name,
            // 'tipe_size' => $this->ImageSize->folder,
            'url' => explode(",", $this->url),
            'url_amigable' => $this->url_amigable,
            'alt' => $this->alt,
            'title' => $this->title,
            'description' => $this->description,
            'deleted' => $this->deleted,
            // 'path' => $this->ImageSize->ImageZone->folder.$this->ImageSize->folder,
            // 'width' => $this->ImageSize->width,
            // 'height' => $this->ImageSize->height,
            'created_at' => $action = empty($this->created_at) ? '' : $this->created_at->format('d-m-Y'),
            'updated_at' => $action = empty($this->updated_at) ? '' : $this->updated_at->format('d-m-Y'),
        ];
    }else {
        return $resp;
    }
    }
}
