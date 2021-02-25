<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etiqueta;

class EtiquetaController extends Controller
{
    public function index() {
        $etiquetas = Etiqueta::all();
        return $etiquetas;
    }

    public function show($id) {
        $etiqueta = Etiqueta::findOrFail($id);
        return $etiqueta;
    }

    public function store(Request $request) {
        $request->validate([
            'desc' => 'required'
        ]);
        $etiqueta = Etiqueta::create($request->all());
        return $etiqueta;
    }

    public function update(Request $request, Etiqueta $etiqueta) {
        $etiqueta->update($request->all());
        return $etiqueta;
    }

    public function destroy(Etiqueta $etiqueta) {
        Etiqueta::destroy($etiqueta->id);
        return $etiqueta;
    }
}
