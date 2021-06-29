<?php

namespace App\Http\Resources;

use App\Models\Elementsaventura;
use App\Models\Aventura;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class AventuraResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        $titulo = (ElementsaventuraResource::collection($this->elementAventura)->firstWhere('element', 'h1'))->value;
        return [
            'id' => $this->id,
            'titulo' => $titulo !== null ? $titulo : null,
            'headerImage' => (ElementsaventuraResource::collection($this->elementAventura)->firstWhere('element', 'img')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'publicado' => $this->publicado,
            'views' => $this->views,
            'elementos' => ElementsaventuraResource::collection($this->elementAventura)
        ];
    }
}
