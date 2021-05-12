<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\EtiquetasPost;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        $post = Post::latest()->paginate(10);
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

        if ($request->file('headerImage')){
            $path = $request->file('headerImage')->store('images');
            //$post->image_url = $request->image_url;
            $request->image_url = $path;
        }
       /*  if (Post::create($request->all())){
            return new PostResource($request);
        } */

        if ($post->save()){
            return new PostResource($post);
        }
    }

    public function update(Request $request, $id) {
        $request->validate([
            //'titulo' => 'required',
            //'image_url' => 'required',
            //'user_id' => 'required'
        ]);
        
        $post = Post::findOrFail($id);       
        //return  $post->update($request->all());
       /*  if ($request->file('headerImage')){
            $path = $request->file('headerImage')->store('images');
            //$post->image_url = $request->image_url;
            $request->image_url = $path;
        } */
        /* if ($post->update($request->all())){
            $etiquetasDeleted = EtiquetasPost::where('post_id', $post->id)->delete();
            return new PostResource($post);
        } */
        
        $post->titulo = $request->titulo;
        $post->subtitulo = $request->subtitulo;
        $post->user_id = $request->user_id;
        
        /* if ($request->file('headerImage')){ */
            $image =  $request->file('headerImage');
            $image_path = $request->headerImage->store('images');
            $post->image_url = $image_path;
        //}

        if ($post->save()){
            $etiquetasDeleted = EtiquetasPost::where('post_id', $post->id)->delete();
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

    public function getMostRecentPosts(){
        $mostRecentPosts = Post::latest()->take(5)->get();
        return PostResource::collection($mostRecentPosts);
    }
}
