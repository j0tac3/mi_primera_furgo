<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EtiquetasPost;
use App\Models\Post;
use App\Models\Seccion;

class EtiquetasPostController extends Controller
{
    public function index() {
        $etiquetasPost = Post::all();
        return $etiquetasPost;
    }

    public function show($id) {
        $etiquetasPost = EtiquetasPost::findOrFail($id);
        return $etiquetasPost;
    }

    public function store(Request $request) {
        $request->validate([
            'post_id' => 'required',
            'etiqueta_id' => 'required',
        ]);
            
        return EtiquetasPost::create($request->all());
    }

    public function update(Request $request, $id) {
        $request->validate([
            'post_id' => 'required',
            'etiqueta_id' => 'required',
        ]);
        
        $etiquetasPost = EtiquetasPost::findOrFail($id);       
        return  $etiquetasPost->update($request->all());
    }

    public function destroy($id) {
        $etiquetasPost = EtiquetasPost::findOrFail($id);        
        return $etiquetasPost->delete();
    }
}
