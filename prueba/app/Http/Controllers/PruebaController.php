<?php

namespace App\Http\Controllers;

use App\Models\Prueba;
use Illuminate\Http\Request;

class PruebaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //Regresa la vista 
        return view('prueba');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('prueba');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //Crear instancia de la clase prueba
        $prueba = new Prueba;

        //Asignación Masiva
        //objeto->variable a llenar -> solicita el valor del campo con el nombre
        //en el archivo html ['']
        $prueba->texto = $request->get('txt');
        $prueba->numero = $request->get('number');

        

        $prueba->save();

        return view('prueba');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\prueba  $prueba
     * @return \Illuminate\Http\Response
     */
    public function show(prueba $prueba)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\prueba  $prueba
     * @return \Illuminate\Http\Response
     */
    public function edit(prueba $prueba)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\prueba  $prueba
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, prueba $prueba)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\prueba  $prueba
     * @return \Illuminate\Http\Response
     */
    public function destroy(prueba $prueba)
    {
        //
    }
}
