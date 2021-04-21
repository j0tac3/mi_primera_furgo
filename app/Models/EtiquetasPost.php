<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtiquetasPost extends Model
{
    use HasFactory;
    protected $fillable = array('id', 'etiqueta_id', 'post_id');

    public function post(){
        return $this->hasOne(Post::class, 'post_id', 'id')->withDefault();
    }

    public function etiqueta(){
        return $this->hasOne(Etiqueta::class, 'etiqueta_id', 'id')->withDefault();
    }
}
