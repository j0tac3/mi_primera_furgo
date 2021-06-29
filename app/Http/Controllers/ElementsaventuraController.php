<?php

namespace App\Http\Controllers;

use App\Http\Resources\ElementsaventuraCollection;
use App\Http\Resources\ElementsaventuraResource;
use Illuminate\Http\Request;
use App\Models\Elementsaventura;
use PHPUnit\Util\Json;

class ElementsaventuraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elementsAventura = Elementsaventura::latest()->paginate(10);
        return ElementsaventuraResource::collection($elementsAventura);
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
        dd(json_decode($request));
        foreach ($request as $element) {
            $elementsAventura = new Elementsaventura();
            $elementsAventura->element = $element->element;
            $elementsAventura->value = $element->value;
            $elementsAventura->aventura_id = $element->aventura_id;
            $elementsAventura->save();
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
        $elementsAventura = Elementsaventura::findOrFail($id);
        return new ElementsaventuraResource($elementsAventura);
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
        foreach ($request as $element) {
            $elementsAventura = Elementsaventura::findOrFail($id);
            $elementsAventura->element = $element->element;
            $elementsAventura->value = $element->value;
            $elementsAventura->aventura_id = $element->aventura_id;
            $elementsAventura->save();
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
        $elementsAventura = Elementsaventura::findOrFail($id);
        if ($elementsAventura->delete()) {
            return new ElementsaventuraResource($elementsAventura);
        }
    }
}
