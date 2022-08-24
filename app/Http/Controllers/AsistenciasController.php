<?php

namespace App\Http\Controllers;

use App\Models\Asistencias;
use App\Models\Estudiantes;
use App\Models\Salones;
use Illuminate\Http\Request;

class AsistenciasController extends Controller
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
        $datosDB['EstudiantesFiltrados'] = Estudiantes::all();
        

        //dd($datosDB);
        return view('asistencias.index',$datosDB);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asistencias  $asistencias
     * @return \Illuminate\Http\Response
     */
    public function show($valor = null)
    {
        //
        $datosDB['Salones'] = Salones::all(); // Leo la tabla estudiantes de la BD
        $datosDB['EstudiantesFiltrados'] = Asistencias::join('estudiantes','asistencias.idEstudiante','=','estudiantes.id')
                                            ->select('estudiantes.*',Asistencias::raw('Count(1) as total_dias,  sum(asistencias.Asistencia) as total_asistencias, 
                                            sum(asistencias.Excusas) as total_justificafiones'))
                                            ->groupBy('estudiantes.id')
                                            ->get();

        //dd($DatosDB);
        return view('asistencias.tables',$datosDB); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asistencias  $asistencias
     * @return \Illuminate\Http\Response
     */
    public function edit(Asistencias $asistencias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asistencias  $asistencias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asistencias $asistencias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asistencias  $asistencias
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asistencias $asistencias)
    {
        //
    }
}
