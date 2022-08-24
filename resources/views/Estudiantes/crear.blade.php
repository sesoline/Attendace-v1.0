<form action="{{ url('/estudiantes') }}" method="POST" enctype="multipart/form-data"> <!-- secoloca multipar porque se va recibir una foto -->

    <!-- esto lo usa laravel como una llave de seguridad para validar los datos que entran al serve -->
    {{ csrf_field() }}          

    @include('estudiantes.form',['Modo'=>'crear'])


</form>