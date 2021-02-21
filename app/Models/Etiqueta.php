<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etiqueta extends Model
{
    use HasFactory;

    public function etiquetaPost(){
        return $this->belongsTo('App\Models\EtiquetaPost');
    }
}
