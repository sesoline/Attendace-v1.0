<form action="{{ url('/salones') }}" method="POST" enctype="multipart/form-data"> <!-- secoloca multipar porque se va recibir una foto -->

    <!-- esto lo usa blade como una llave de seguridad para validar los datos que entran al serve -->
    {{ csrf_field() }}       
      
    <label for="Grado"> Grado: </label>
    <input type="text" name="Grado" id="Grado" value="" >
    <br>
    <label for="Jornada"> Jornada: </label>
    <input type="text" name="Jornada" id="Jornada" value="" >
    <br>
    <label for="Sede"> Sede: </label>
    <input type="text" name="Sede" id="Sede" value="" >
    <br>
    <label for="Director"> Director: </label>
    <input type="text" name="Director" id="Director" value="" >
    <br>
    <input type="submit" value="Crear">
</form>
