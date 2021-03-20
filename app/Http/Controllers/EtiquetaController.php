<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etiqueta;

class EtiquetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etiquetas = Etiqueta::all();
        return $etiquetas;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* $request->validate([
            'desc' => 'required'
        ]); */
        
        $etiqueta = Etiqueta::create($request->all());
        return $etiqueta;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $etiqueta = Etiqueta::findOrFail($id);
        return $etiqueta;
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
        $request->validate([
            'desc' => 'required'
        ]);
        
        $etiqueta = Etiqueta::findOrFail($id);
        $etiqueta->update($request->all());
        return $etiqueta;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $etiqueta = Etiqueta::findOrFail($id);
        $etiqueta->delete();
        return $etiqueta;
    }
}