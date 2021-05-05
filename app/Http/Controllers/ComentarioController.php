<?php

namespace App\Http\Controllers;

use App\Http\Resources\ComentariosResource;
use Illuminate\Http\Request;
use App\Models\Comentario;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comentario = Comentario::paginate(10);
        return ComentariosResource::collection($comentario);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'texto' => 'required',
            'user_id' => 'user_id',
            'post_id' => 'post_id',
        ]);

        $comentario = new Comentario();
        $comentario->user_id = $request->user_id;
        $comentario->post_id = $request->post_id;
        $comentario->texto = $request->texto;

        if ($comentario->save()){
            return new ComentariosResource($comentario);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comentario = Comentario::findOrFail($id);
        return new ComentariosResource($comentario);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $comentario = Comentario::findOrfail($id);
       $comentario->user_id = $request->user_id;
       $comentario->post_id = $request->post_id;
       $comentario->texto = $request->texto;

       if ($comentario->save()){
           return new ComentariosResource($comentario);
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comentario = Comentario::findOrFail($id);
        if ($comentario->delete()){
            return new ComentariosResource($comentario);
        }
    }
}
