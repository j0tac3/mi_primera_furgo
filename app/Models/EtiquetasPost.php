<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtiquetasPost extends Model
{
    use HasFactory;
    protected $fillable = array('id', 'etiqueta_id', 'post_id');

    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function etiqueta(){
        return $this->belongsTo(Etiqueta::class)->withDefault();
    }
}
