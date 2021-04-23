<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = array('titulo', 'subtitulo', 'image_url', 'user_id');

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function seccion(){
        return $this->hasMany(Seccion::class);
    }

    public function etiquetaPost(){
        return $this->hasMany(EtiquetasPost::class);
    }

    public function comentario(){
        return $this->hasMany(Comentario::class);
    }
}
