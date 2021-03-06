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
        $titulo = (ElementsaventuraResource::collection($this->elementAventura)->firstWhere('element', 'h1'));
        $headerImage = (ElementsaventuraResource::collection($this->elementAventura)->firstWhere('element', 'img'));
        $resumen = (ElementsaventuraResource::collection($this->elementAventura)->firstWhere('element', 'p'));
         
        return [
            'id' => $this->id,
            'titulo' => $titulo !== null ? $titulo->value : null,
            'headerImage' => $headerImage !== null ? $headerImage->value : null,
            'resumen' => $resumen !== null ? $resumen->value : null,
            'fecha_creacion' => $this->created_at,
            'creado_hace' => $this->created_at->diffForHumans(),
            'updated_at' => $this->updated_at,
            'publicado' => $this->publicado,
            'views' => $this->views,
            'elementos' => ElementsaventuraResource::collection($this->elementAventura),
            'user' => $this->user,
        ];
    }
}
