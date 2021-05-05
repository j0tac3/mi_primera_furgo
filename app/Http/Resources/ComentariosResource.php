<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ComentariosResource extends JsonResource
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
        $post = $this->whenLoaded('post');
        return [
            'id' => $this->id,
            'post_id' => $this->post_id,
            'user_id' => $this->etiqueta_id,
            'texto' => $this->etiqueta->desc,
            'post' => (new PostResource($post)),
            //'post' => $this->post,
        ];
    }
}
