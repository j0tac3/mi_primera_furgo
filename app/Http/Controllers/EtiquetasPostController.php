<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EtiquetaPost;

class EtiquetasPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $etiquetasPost = EtiquetaPost::all();
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
            'titulo' => 'required',
            //'image_url' => 'required',
            //'user_id' => 'required'
        ]);
        
        $etiquetasPost = EtiquetaPost::findOrFail($id);       
        return  $etiquetasPost->update($request->all());
    }

    public function destroy($id) {
        $etiquetasPost = EtiquetaPost::findOrFail($id);        
        return $etiquetasPost->delete();
    }
}
