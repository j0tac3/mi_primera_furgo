<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etiqueta extends Model
{
    use HasFactory;
    protected $fillable = array('desc');

    public function etiquetaPost(){
        return $this->hasMany('App\Models\EtiquetaPost');
    }
}
