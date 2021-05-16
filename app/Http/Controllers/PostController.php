<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\EtiquetasPost;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

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

        if ($request->hasFile('headerImage')){
            $imageName =  public_path('/images');
            $imageFinalURL = $imageName.'/'.$request->file('headerImage')->getClientOriginalName();
            //$image_path = Storage::disk('local')->put($imageFinalURL, File::get($request->file('headerImage')));
            $imageFile = $request->file('headerImage')->storeAs('images',$request->file('headerImage')->getClientOriginalName());
            dd($imageFile);
            $post->image_url = $request->file('headerImage')->getClientOriginalName();
            dd($post->image_url);
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
        $post->titulo = $request->titulo;
        $post->subtitulo = $request->subtitulo;
        $post->user_id = $request->user_id;
        $post->image_url = $request->name;

        if ($request->hasFile('headerImage')){
            $imageName =  public_path('/images');
            $imageFinalURL = $imageName.'/'.$request->file('headerImage')->getClientOriginalName();
            //$image_path = Storage::disk('local')->put($imageFinalURL, File::get($request->file('headerImage')));
            $imageFile = $request->file('headerImage')->storeAs('images',$request->file('headerImage')->getClientOriginalName());
            $post->image_url = $request->file('headerImage')->getClientOriginalName();
        }

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
