<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = array('titulo', 'image_url', 'user_id');

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function seccion(){
        return $this->hasOne(Seccion::class);
    }

    public function etiquetaPost(){
        return $this->hasOne(EtiquetasPost::class);
    }

    public function comentario(){
        return $this->hasOne(Comentario::class);
    }
}
