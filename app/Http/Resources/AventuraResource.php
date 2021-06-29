<?php

namespace App\Http\Resources;

use App\Models\Elementsaventura;
use App\Models\Aventura;
use Illuminate\Http\Resources\Json\JsonResource;

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
        return [
            'id' => $this->id,
            'titulo' => Elementsaventura::select('value')->where('aventura_id', '=', $this->id)->where('element','h1')->first(),
            'headerImage' => Elementsaventura::select('value')->where('aventura_id', '=', $this->id)('value')->where('element','img')->first(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'publicado' => $this->publicado,
            'elementos' => ElementsaventuraResource::collection($this->elementAventura)
        ];
    }
}
