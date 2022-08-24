<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\SalonController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

https://technext.github.io/admin/ ---> plantilla tailwind

artisan route:list -> se usa para ver que links hay a la pagina

artisa make:auth

auth::routes(); // estan todas las opciones
auth::routes(['Register'=>false,'Reset'=>false]); // desactiva opciones de login

Route::get('/nuevoSalon/{idSalon}/{id3}', function ($id, $id3) {

*/






Route::get('/', function () {
    
    return view('welcome');
});

Route::get('/nuevoSalon', function () {
    //dd($id);
    return view('nuevoSalon');
});




Route::get('/asistenci', function () {
    //dd($id);
    return view('Asistencias.index');
});

Route::get('/scan1', function () {
    //dd($id);
    return view('scan1');
});

Route::get('/nuevo', function () {
    //dd($id);
    return view('nuevo');
});

Route::get('/q', function () {
    //dd($id);
    return view('scan2');
});

// 1ra forma de usar sin usar el controllador para llamar vistas
/*
Route::get('/estudiantes', function () {
    return view('estudiantes.index');
});
*/

// 2d forma de usar controllador... Aqui debemos crear el return en el controlador
/*
Route::get('/estudiantes', 'App\Http\Controllers\EstudiantesController@index');  //porque no me deja usar solo EstudiantesController@index
*/

// 3r forma, todo los paquetes en uno
Route::resource('estudiantes','App\Http\Controllers\EstudiantesController');
Route::resource('salones','App\Http\Controllers\SalonesController');
Route::resource('asistencias','App\Http\Controllers\AsistenciasController');