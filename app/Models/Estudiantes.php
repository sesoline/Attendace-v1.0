<?php

// Este archivo lo cree con artisan usando la instruccion
//      -> vendor/bin/sail artisan make:model Estudiantes -mcr
//
// Esta instruccion crea automaticamente el modelo, el controlador, y la tabla de migracion

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiantes extends Model
{
    use HasFactory;

    public $cont = 0;

    public function suma()
    {
        $this->count++;

    }

    public static function resta($asdfdf)
    {
        return true;
    }
}
