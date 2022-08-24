<!-- 
    isset($gato)?$gato->Nombres:'' }

    isset es un if negado, tecnocamente pregunta: "Sino es nulo haga..."

-->

@extends('layout')

@section('content')
    
<div class="w-1/3 place-content-center">
    <div class="md:flex md:items-center mb-6">
        <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name"for="Nombres"> Nombres: </label>
        <input class="bg-grey-200 appearance-none border-1 border-grey-200 rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple-light" type="text" name="Nombres" id="Nombres" value="{{ isset($gato)?$gato->Nombres:'' }}" >
    </div>
    
    <div class="md:flex md:items-center mb-6">
        <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name" for="PrimerApellido"> PrimerApellido: </label>
        <input class="bg-grey-200 appearance-none border-1 border-grey-200 rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple-light" type="text" name="PrimerApellido" id="PrimerApellido" value="{{ isset($gato)?$gato->PrimerApellido:'' }}" >
    </div>
    
    <div class="md:flex md:items-center mb-6">
        <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name" for="SegundoApellido"> SegundoApellido: </label>
        <input class="bg-grey-200 appearance-none border-1 border-grey-200 rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple-light" type="text" name="SegundoApellido" id="SegundoApellido" value="{{ isset($gato)?$gato->SegundoApellido:'' }}" >
    </div>
    
    <div class="md:flex md:items-center mb-6">
        <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name" for="Salon"> Salon: </label>
        <input class="bg-grey-200 appearance-none border-1 border-grey-200 rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple-light" type="text" name="Salon" id="Salon" value="{{ isset($gato)?$gato->Salon:'' }}" >
    </div>
    
    <div class="md:flex md:items-center mb-6">    
        <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name" for="Telefono"> Telefono: </label>
        <input class="bg-grey-200 appearance-none border-1 border-grey-200 rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple-light" type="number" name="Telefono" id="Telefono" value="{{ isset($gato)?$gato->Telefono:'' }}" >
    </div>
    
    <div class="md:flex md:items-center mb-6">
        <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name" for="Direccion"> Direccion: </label>
        <input class="bg-grey-200 appearance-none border-1 border-grey-200 rounded w-full py-2 px-4 text-grey-darker leading-tight focus:outline-none focus:bg-white focus:border-purple-light" type="text" name="Direccion" id="Direccion" value="{{ isset($gato)?$gato->Direccion:'' }}" >
    </div>
    
    <div class="md:flex md:items-center mb-6">
        <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name" for="email"> e-mail: </label>
        <input class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name" type="email" name="email" id="email" value="{{ isset($gato)?$gato->email:'' }}" >
    </div>
    
    <div class="md:flex md:items-center mb-6">
        <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name"for="Sexo"> Sexo: </label>
        <input class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4" type="radio" name="Sexo" value="h">  Hombre
        <input class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4 ml-4" type="radio" name="Sexo" value="m">  Mujer
    </div>
    
    <div class="md:flex md:items-center mb-6">
        <label class="block text-gray-500 font-regular md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name"for="Foto"> Foto: </label>
    </div>
    
    @if(isset($gato->Foto))
        <img src="{{ asset('storage').'/'.$gato->Foto }}" width="300" alt=""> 
        <br>
    @endif
    
    <input  class="bg-transparent hover:bg-blue-500 text-blue-dark font-semibold hover:text-white py-2 px-4 border 
    border-blue hover:border-transparent rounded" type="file" name="Foto" id="Foto" value="" >
    <br><br>
    <div class="flex justify-end">
        <input class="bg-transparent hover:bg-blue-500 text-blue-dark font-semibold hover:text-white py-2 px-4 border 
        border-blue hover:border-transparent rounded" type="submit" value="{{ $Modo=='crear' ? 'Agregar' : 'Actualizar' }}">
    </div>
    
    
</div>

@endsection
