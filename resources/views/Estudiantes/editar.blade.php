Editar estudiante
<br>
<br>
<form action="{{ url('/estudiantes/'.$gato->id) }}" method="POST" enctype="multipart/form-data"> <!-- secoloca multipar porque se va recibir una foto -->

    <!-- esto lo usa blade como una llave de seguridad para validar los datos que entran al serve -->
    {{ csrf_field() }}        
    <!-- esto lo usa blade para enviar un metedo del tipo pactch \ -->
    {{ method_field('PATCH') }}      
      

@include('estudiantes.form',['Modo'=>'editar'])

</form>