<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Elementsaventura extends Model
{
    use HasFactory;

    public function aventura(){
        return $this->belongsTo(Aventura::class);
    }
}
