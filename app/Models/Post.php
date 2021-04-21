<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = array('titulo', 'image_url', 'user_id');

    public function user(){
        return $this->belongsTo(User::class)->withDefault();;
    }

    public function seccion(){
        return $this->belongsTo(Seccion::class)->withDefault();;
    }

    public function etiquetaPost(){
        return $this->belongsTo(EtiquetasPost::class)->withDefault();;
    }

    public function comentario(){
        return $this->belongsTo(Comentario::class)->withDefault();;
    }
}
