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
       /*  $request->validate([
            'titulo' => 'required',
            'user_id' => 'required'
        ]); */
        //return Post::create($request->all())

        $post = new Post();
        $post->titulo = $request->titulo;
        $post->subtitulo = $request->subtitulo;
        $post->user_id = $request->user_id;

        if ($request->file('headerImage')){
            //dd($request->file('headerImage'));
            dd($request->headerImage);
            $imageName =  public_path('/images').$request->file('headerImage')->getClientOriginalName();
            dd($imageName);
            $image_path = Storage::disk('local')->put($imageName, File::get($request->file('headerImage')));
            $post->image_url = $imageName;
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
        dd($request);
        $post->titulo = $request->titulo;
        $post->subtitulo = $request->subtitulo;
        $post->user_id = $request->user_id;
        $post->image_url = $request->name;
        
        /* if ($request->file('headerImage')){ */
            /* $imageName =  $request->file('headerImage');
            $image_path = Storage::putFile('public/images', $request->headerImage);*/
            //$post->image_url = $request->headerImage->getClientOriginalName();
            if ($request->headerImage){
                dd($request->headerImage);
                $imageName =  $request->file('headerImage');
                $image_path = Storage::put('public/images', $imageName);
                $post->image_url = $imageName->getClientOriginalName();
            }
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
