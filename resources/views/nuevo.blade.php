@extends('layout')

@section('content')

<div class="flex flex-row justify-center h-2/3">
    <div class=" flex flex-col w-1/6 justify-center">
        
            <img src="http://cdn.onlinewebfonts.com/svg/img_554080.png" width="40" height="">
            <button class="bg-transparent hover:bg-blue-500 text-blue-dark font-semibold hover:text-white py-2 px-4 
            border border-blue hover:border-transparent rounded" onclick="window.location='{{ url("estudiantes/create") }}'">
                Crear Estudiante
            </button>
        
    </div>
    <div class="ml-8 flex flex-col w-1/6 justify-center">
        
        <img src="https://icon-library.com/images/multiple-people-icon/multiple-people-icon-4.jpg" width="40">
        <button class="bg-transparent hover:bg-blue-500 text-blue-dark font-semibold hover:text-white py-2 px-4 border 
        border-blue hover:border-transparent rounded" onclick="window.location='{{ url("estudiantes/create") }}'">
            Crear un Salon
        </button>
    </div>
</div>

    
@endsection