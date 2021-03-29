<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EtiquetaPost;
use App\Models\Imagen;

class EtiquetasPostController extends Controller
{
    public function index() {
        $etiquetasPost = Imagen::all();
        return $etiquetasPost;
    }

    public function show($id) {
        $etiquetasPost = EtiquetaPost::findOrFail($id);
        return $etiquetasPost;
    }

    public function store(Request $request) {
        $request->validate([
            'post_id' => 'required',
            'etiqueta_id' => 'required',
        ]);
            
        return EtiquetaPost::create($request->all());
    }

    public function update(Request $request, $id) {
        $request->validate([
            'post_id' => 'required',
            'etiqueta_id' => 'required',
        ]);
        
        $etiquetasPost = EtiquetaPost::findOrFail($id);       
        return  $etiquetasPost->update($request->all());
    }

    public function destroy($id) {
        $etiquetasPost = EtiquetaPost::findOrFail($id);        
        return $etiquetasPost->delete();
    }
}