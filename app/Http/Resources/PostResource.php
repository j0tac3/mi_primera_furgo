<?php

namespace App\Http\Resources;

use DateTime;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ImagenController;

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
        $currentDate = new DateTime();
        return [
            'id' => $this->id,
            'titulo' => $this->titulo,
            'subtitulo' => $this->subtitulo,
            'image_url' => $this->image_url,
            //'imageFile' => base64_encode(Storage::get('images/'.$this->image_url)),
            'imageFile' => $this->getImageFile($this->image_url),
            'user_id' => $this->user_id,
            'user_name' => $this->user->name,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'timeFrom' => $this->created_at->diffForHumans(),
            'etiquetas' => EtiquetasPostResource::collection(($this->etiquetaPost)),
            'comentarios' => ComentariosResource::collection(($this->comentario)),
            'nComents' => ComentariosResource::collection(($this->comentario))->count(),
            'views' => rand(2, 50), //Falta añadir el campo a la migracion
        ];
    }

    public function getImageFile($imageURL){
        $path = storage_path('images'.'/'.$imageURL);
        //dd($path);
        dd($path . Storage::disk('public')->exists($path));
        if(Storage::exists($path)){
            dd($path);
            return Storage::get($imageURL);
        }
    }

    public function with($request)
    {
        return [
            'version' => '1.0.0',
            'author' => 'SerJun'
        ];
    }
}