<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public $preserveKeys = true;

    public function toArray($request)
    {
        //return parent::toArray($request);

        $etiquetasPost = $this->whenLoaded('etiquetaPost');
        return [
            'id' => $this->id,
            'titulo' => $this->titulo,
            'image_url' => $this->image_url,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'etiquetas' => $this->etiquetaPost,
            //'etiquetas' => (new EtiquetasPostCollection($etiquetasPost)),
            //'etiquetas' => EtiquetasPostResource::collection($this->whenLoaded('etiquetaPost')),
        ];
    }

    public function with($request)
    {
        return [
            'version' => '1.0.0',
            'author' => 'SerJun'
        ];
    }
}