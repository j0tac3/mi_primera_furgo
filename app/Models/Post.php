<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = array('titulo', 'image_url', 'user_id');

    public function user(){
        return $this->hasOne('App\Models\User');
    }

    public function seccion(){
        return $this->belongsTo('App\Models\Seccion');
    }

    public function etiquetaPost(){
        return $this->belongsTo('App\Models\EtiquetaPost');
    }

    public function comentario(){
        return $this->belongsTo('App\Models\Comentario');
    }
}
