<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Etiquetaspost;

class EtiquetasPostController extends Controller
{
    public function index() {
        $etiquetasPost = Post::all();
        return $etiquetasPost;
    }

    public function show($id) {
        $etiquetasPost = Etiquetaspost::findOrFail($id);
        return $etiquetasPost;
    }

    public function store(Request $request) {
        $request->validate([
            'post_id' => 'required',
            'etiqueta_id' => 'required',
        ]);
            
        return Etiquetaspost::create($request->all());
    }

    public function update(Request $request, $id) {
        $request->validate([
            'post_id' => 'required',
            'etiqueta_id' => 'required',
        ]);
        
        $etiquetasPost = Etiquetaspost::findOrFail($id);       
        return  $etiquetasPost->update($request->all());
    }

    public function destroy($id) {
        $etiquetasPost = Etiquetaspost::findOrFail($id);        
        return $etiquetasPost->delete();
    }
}
