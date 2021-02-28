<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        $etiquetas = Post::all();
        return $etiquetas;
    }

    public function show($id) {
        $post = Post::findOrFail($id);
        return $post;
    }

    public function store(Request $request) {
        $request->validate([
            'titulo' => 'required',
            //'image_url' => 'required',
            'user_id' => 'required'
        ]);
            
        return Post::create($request->all());
    }

    public function update(Request $request, $id) {
        $request->validate([
            'titulo' => 'required',
            //'image_url' => 'required',
            'user_id' => 'required'
        ]);
        
        $post = Post::findOrFail($id);       
        return  $post->update($request->all());
    }

    public function destroy($id) {
        $post = Post::findOrFail($id);        
        return $post->delete();
    }
}
