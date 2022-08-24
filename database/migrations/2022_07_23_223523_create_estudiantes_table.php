<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->string('Nombres');
            $table->string('PrimerApellido');
            $table->string('SegundoApellido');
            $table->bigInteger('Telefono');
            $table->string('Direccion');
            $table->string('email');
            $table->string('Sexo');
            $table->string('Foto');
            $table->string('Salon');
            
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estudiantes');
    }
};
