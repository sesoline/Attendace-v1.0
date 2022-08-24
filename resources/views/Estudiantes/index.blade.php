@extends('layout')

@if(Session::has('mensaje')){{
    Session::get('mensaje')
}}

@endif


@section('content')

<div class="flex flex-row-reverse mb-6 md:flex md:items-center">   
    <div class="px-2" >
        <button class="bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounded " type="button" onclick="window.location='{{ url("estudiantes/create") }}'">
            Crear Estudiante
        </button>
    </div>
</div>

<div class="flex flex-1  flex-col md:flex-row lg:flex-row mx-2">
    <!--Horizontal form-->
    <div class="mb-2 border-solid border-grey-light rounded border shadow-sm w-full md:w-full lg:w-full">
        <div class="bg-gray-300 px-2 py-3 border-solid border-gray-400 border-b">
            Estudiantes
        </div>
        <div class="p-3">
            <table class="table-fixed">
                <thead>
                  <tr>
                    <th class="border w-1/16 px-4 py-2"> # </th>
                    <th class="border w-1/4 px-4 py-2"> Apellidos </t>
                    <th class="border w-1/4 px-4 py-2"> Nombres </th>
                    <th class="border w-1/4 px-4 py-2"> Telefono </th>
                    <th class="border w-1/2 px-4 py-2"> Direccion </th>
                    <th class="border w-1/4 px-4 py-2"> email </th>
                    <th class="border w-1/8 px-4 py-2"> Sexo</th>
                    <th class="border w-1/4 px-4 py-2"> Foto </th>
                    <th class="border w-1/2 px-4 py-2"> Acciones </th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($Estudiantes as $i)
                     <tr>
                        <td class="border px-4 py-2">{{$loop->iteration}}</td>  <!-- Esto es para mostrar enumerar cada registro -->
                        <td class="border px-4 py-2">{{ $i->PrimerApellido . " " . $i->SegundoApellido}}</td>
                        
                        <td class="border px-4 py-2">{{ $i->Nombres}}</td>
                        <td class="border px-4 py-2">{{ $i->Telefono}}</td>
                        <td class="border px-4 py-2">{{ $i->Direccion}}</td>
                        <td class="border px-4 py-2">{{ $i->email}}</td>
                        <td class="border px-4 py-2">{{ $i->Sexo}}</td>
                        <td class="border px-4 py-2">
                            <img src="{{ asset('storage').'/'.$i->Foto }}" width="30" alt=""> 
                        </td>
                        <!--    No se puede usar {{ url('estudiantes/'.$i->foto)}} porque laravel por seguridad no permite acceder a esa carpeta 
                        
                        Por tanto se usa el comando de blade llamado {{ asset('') }}

                        Por otro lado, asi el comando enruta a la imagen, laravel por seguridad no permite que se enlace a menos que se ejecute este comando en la terminal

                        php artisan storage:link

                        -->

                        <td class="border px-4 py-2">
                            <a href="{{ url('/estudiantes/'.$i->id.'/edit')}}">
                                Editar
                            </a>
                            | 
                            <form method="post" action="{{ url('/estudiantes/'.$i->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" onclick="return confirm('Se eliminara el registro de la BD, Are  you sure?')"> Borrar </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                  
                </tbody>
            </table>
        </div>
    </div>
    <!--/Horizontal form-->

    
</div>

@endsection