<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtiquetaPost extends Model
{
    use HasFactory;

    public function etiqueta(){
        return $this->hasOne('App\Models\Etiqueta');
    }

    public function post(){
        return $this->hasOne('App\Models\Post');
    }
}
