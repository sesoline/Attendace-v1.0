<?php

namespace App\Http\Controllers;

use App\Models\Estudiantes;
use App\Models\Salones;
use Illuminate\Http\Request;

class SalonesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datosDB['Salones'] = Salones::all(); // Leo la tabla estudiantes de la BD
        $datosDB['Estudiantes'] = Estudiantes::all();
        

        //dd($datosDB);
        return view('Salones.index',$datosDB);  // Le paso la variable datosDB a la vista
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Salones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        $datosRecibidos=request()->except('_token');

        Salones::insert($datosRecibidos);
        
        //return response()->json($datosRecibidos);
        return redirect('salones');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Salones  $salones
     * @return \Illuminate\Http\Response
     */
    public function show($valor = null)
    {
        //
        $datosDB['Salones'] = Salones::all(); // Leo la tabla estudiantes de la BD
        $datosDB['Estudiantes'] = Estudiantes::where('Salon','=',$valor)->get();

        //dd($valor);
        

        //dd($datosDB['Estudiantes'][1]);
        return view('Salones.index',$datosDB); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Salones  $salones
     * @return \Illuminate\Http\Response
     */
    public function edit(Salones $salones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Salones  $salones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salones $salones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Salones  $salones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salones $salones)
    {
        //
    }
}
