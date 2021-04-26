<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class PostController extends Controller
{
    public function index() {
        $post = Post::paginate(10);
        return PostResource::collection($post);
    }

    public function show($id) {
        $post = Post::findOrFail($id);
        return new PostResource($post);
    }

    public function store(Request $request) {
        $request->validate([
            'titulo' => 'required',
            'user_id' => 'required'
        ]);
        //return Post::create($request->all())

        $post = new Post();
        $post->titulo = $request->titulo;
        $post->subtitulo = $request->subtitulo;
        $post->user_id = $request->user_id;

        /* $path = Storage::putFile('images', $request->file('headerImage'));
        //$post->image_url = $request->image_url;
        $post->image_url = $path; */

        if ($post->save()){
            return new PostResource($post);
        }
    }

    public function update(Request $request, $id) {
        $request->validate([
            'titulo' => 'required',
            //'image_url' => 'required',
            //'user_id' => 'required'
        ]);
        
        $post = Post::findOrFail($id);       
        //return  $post->update($request->all());
        $post->titulo = $request->titulo;
        $post->subtitulo = $request->subtitulo;
        $post->user_id = $request->user_id;
        
        /* if ($request->file('headerImage')){
            $image =  $request->file('headerImage');
            $image_path = $image->store('images');
            $post->image_url = $image_path;
        }
 */
        if ($post->save()){
            return new PostResource($post);
        }
    }

    public function destroy($id) {
        $post = Post::findOrFail($id);        
        //return $post->delete();
        if ($post->delete()){
            return new PostResource($post);
        }
    }
}
