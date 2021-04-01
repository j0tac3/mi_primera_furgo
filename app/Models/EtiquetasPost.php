<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etiquetaspost extends Model
{
    use HasFactory;
    protected $fillable = array('etiqueta_id', 'post_id');

}
