<?php

namespace App\Http\Controllers;

use App\Models\Estudiantes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;     //esta libreria es para usar un metodo para borrar unaa foto delservidor

class EstudiantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datosDB['Estudiantes'] = Estudiantes::all(); // Leo la tabla estudiantes de la BD

        //dd($datosDB);
        return view('estudiantes.index',$datosDB);  // Le paso la variable datosDB a la vista
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $r)
    {
        return view('estudiantes.crear');
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
        //$datosRecibidos=request()->all();   aqui recibe todo, inclusivo el token
        $datosRecibidos=request()->except('_token');

        $datosRecibidos['Telefono']= (int) $datosRecibidos['Telefono']; // pilas que no le cabe numeros de celular
   

        //Almacenar la foto en el servidor
        if(request()->hasFile('Foto')){
            $datosRecibidos['Foto']=$request->file('Foto')->store('uploads','public');
        }

        Estudiantes::insert($datosRecibidos);
        //return response()->json($datosRecibidos);
        return redirect('estudiantes')->with('mensaje','Estudiante agregado con exito');
       
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estudiantes  $estudiantes
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiantes $estudiantes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estudiantes  $estudiantes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $asdf = new Estudiantes();
        $estudiante['gato']= $asdf->findOrFail($id);
        return view('Estudiantes.editar',$estudiante);   // En el video ensenaron otra manera de pasar el dato, y es con la funcion compact('estudiante')
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estudiantes  $estudiantes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosRecibidos=request()->except(['_token','_method']); // ahora tambien se le debe dar excepcion el method, pues este es enviado desde el formulario de actualizar

        //Borrado y actualizacion de fotogradia
        if(request()->hasFile('Foto')){
            $estudianteViejo=Estudiantes::findOrFail($id);
            Storage::delete('public/'.$estudianteViejo->Foto);

            $datosRecibidos['Foto']=$request->file('Foto')->store('uploads','public');
        }

        $datosRecibidos['Telefono']=(int)$datosRecibidos['Telefono']; // pilas que no le cabe numeros de celular

        Estudiantes::where('id','=',$id)->update($datosRecibidos); // busca el id  y lo actualiza

       
        return redirect('estudiantes')->with('mensaje','Estudiante modificado con exito');;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estudiantes  $estudiantes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estudianteViejo=Estudiantes::findOrFail($id);

        if(Storage::delete('public/'.$estudianteViejo->Foto)){  //La funcion delete aparte de borrar el archivo devuelve un boolean, eso lo vamos usar para continuar la eliminacion del registro
            Estudiantes::destroy($id);
        }

    
        return redirect('estudiantes')->with('mensaje','Estudiante eliminado con exito');;
        ;
    }
}
