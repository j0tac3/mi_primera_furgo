<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticuloResource extends JsonResource
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
            'name' => $this->ame,
            'desc' => $this->desc,
            'image' => $this->image,
            'precio' => $this->precio,
            'url' => $this->url
        ];
    }
}
