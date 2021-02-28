<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    use HasFactory;
    protected $fillable = array('desc', 'seccion_id');

    public function seccion(){
        return $this->hasOne('App\Models\Seccion');
    }
}
