<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtiquetasPost extends Model
{
    use HasFactory;
    protected $fillable = array('id', 'etiqueta_id', 'post_id');

    public function post(){
        return $this->hasOne('App\Models\Post');
    }

    public function etiqueta(){
        return $this->hasOne('App\Models\etiqueta');
    }
}
