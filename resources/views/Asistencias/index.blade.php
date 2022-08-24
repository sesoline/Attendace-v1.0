@extends('layout')

@section('title')
    Asistencias
@endsection

@section('content')

<script>

        function salon(){
            //alert("papi");
            var a = document.getElementById("selectSalon").value;
            return window.location='{{ url("asistencias")  }}'+"/"+a;
            
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



    



@endsection