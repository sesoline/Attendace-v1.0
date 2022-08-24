@extends('layout')

@section('title')
    nuevo Salon
@endsection

@section('content')
<div class="flex flex-row">
    <div>
        <button class="bg-transparent hover:bg-blue-500 text-blue-dark font-semibold hover:text-white py-2 px-4 border border-blue hover:border-transparent rounded">
            Ver Salones
        </button>
    </div>
    <div>
        <button class="bg-transparent hover:bg-blue-500 text-blue-dark font-semibold hover:text-white py-2 px-4 border border-blue hover:border-transparent rounded">
            Crear un Salon
        </button>
    </div>
</div>


@endsection

