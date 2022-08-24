@extends('layout')

@section('title')
    nuevo Salon
@endsection

@section('content')

<script>

        function salon(){
            //alert("papi");
            var a = document.getElementById("selectSalon").value;
            return window.location='{{ url("salones") }}'+"/"+a;
            
        }


</script>

<div class="md:flex md:items-center mb-6">
  <div class="">
      <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
          Seleccione Salon: 
      </label>
  </div>
  <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
    <div class="relative">
        <select class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey" id="selectSalon" onchange="salon()">
            <option value=""></option>
            @foreach($Salones as $Salon)
                <option value="{{ $Salon->Grado }}">{{ $Salon->Grado . ' Jornada ' . $Salon->Jornada . ' - Sede: ' . $Salon->Sede }}</option>
            @endforeach
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-grey-darker">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
            </svg>
        </div>
    </div>
  </div>
  <div></div>

</div>

<?php 
    //use App\Models\Estudiantes;
    //$perro = Estudiantes::where('Salon','=',$Valor)->get();
    //dd($perro);
?>


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

    



@endsection

