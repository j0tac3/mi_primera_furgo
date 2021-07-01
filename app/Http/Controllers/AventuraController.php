<?php

namespace App\Http\Controllers;

use App\Http\Resources\AventuraCollection;
use App\Http\Resources\AventuraResource;
use Illuminate\Http\Request;
use App\Models\Aventura;

class AventuraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aventura = Aventura::latest()->paginate(10);
        return AventuraResource::collection($aventura);
    }

    public function aventurasPublicadas()
    {
        $aventura = Aventura::where('publicado', '=', true)->latest()->paginate(10);
        return AventuraResource::collection($aventura);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $aventura = new Aventura();
        $aventura->publicado = $request->publicado;
        $aventura->user_id = $request->user_id;
        $aventura->views = 1;
        if ($aventura->save()){
            return new AventuraResource($aventura);
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
        $aventura = Aventura::findOrFail($id);
        return new AventuraResource($aventura);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $aventura = Aventura::findOrFail($id);
        $aventura->publicado = $request->publicado;
        $aventura->user_id = $request->user_id;
        if ($aventura->save()){
            return new AventuraResource($aventura);
        }
    }

    public function publicarAventura(Request $request, $id)
    {
        $aventura = Aventura::findOrFail($id);
        $aventura->publicado = $request->publicado;
        if ($aventura->save()){
            return new AventuraResource($aventura);
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
        $aventura = Aventura::findOrFail($id);
        if ($aventura->delete()) {
            return new AventuraResource($aventura);
        }
    }
}
