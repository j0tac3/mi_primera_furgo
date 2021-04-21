<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    use HasFactory;

    protected $fillable = array('order', 'texto', 'post_id');

    public function post(){
        return $this->belongsTo('App\Models\Post')->withDefault();;
    }

    public function imagen(){
        return $this->hasOne('App\Models\Imagen')->withDefault();;
    }
}
