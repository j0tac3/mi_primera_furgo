<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    use HasFactory;

    public function post(){
        return $this->hasOne('App\Models\Post');
    }

    public function imagen(){
        return $this->hasOne('App\Models\Imagen');
    }
}
