<?php

use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\PJController;
use App\Http\Controllers\WeaponController;
use App\Models\Equipment;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::view('/', 'welcome');

//Route::get('/equipment', [EquipmentController::class,'index']);
Route::get('/weapon', [WeaponController::class,'index']);
Route::view('/crearPJ', 'forms/formularioPJ');
Route::view('/elegirEq', 'forms/formularioEq');

//https://es.wikieducator.org/Usuario:ManuelRomero/Laravel/routing


/*Parte de la ruta puede ser parametrizada, es decir podemos especificar variables una ruta,
 de forma que parte del nombre de la ruta sea un valor para la url */

Route::get('/numero/{number}', function($number){
    Return "<h2>Estás en el número $number</h2>";
});

Route::get('/news/{campo}/{number}', function($campo,$number){

    $campito= strtolower($campo);
    $campito= substr($campito,0,-1);


    return view('periodico', ['campo' => $campo,'campito' => $campito,'number' => $number]);

    //Return "<h2>$campo y $campito número $number</h2>";
});

/*Podríamos querer limitar el parámetro a un tipo de valores concreto (por ejemplo en este caso a número)
Lo podemos hacer usando expresiones regulares con el método pattern'*/


Route::pattern('num', '[0-9]+');

Route::get("noticias/{num}", function($num){
       return ("Estás en la noticia número  ".$num);
});

//Parámetros con valores por defecto por si no se aportan

Route::get('noticias2/{nombre?}', function($name = 'deportes')
{
    return ("Estás en las noticias de tipo ".$name);
});

/*
    Parámetros con restricciones de valor (si es número ...., si es caracteres ... ...)
    En este caso solo se aplica al parámetro de la ruta.
*/

Route::get('noticias/tipo/{nombre}', function($nombre)
{
   return("Ahora estás viendo las noticias ".$nombre);
})
->where('nombre', '[A-Za-z]+');

Route::get('noticias/tipo/{num}', function($num)
{
       return("Ahora estás en la noticia número ".$num);
})
->where('number', '[0-9]+');

Route::view('/home', 'home');

Route::view('/about', 'about');

Route::view('/contact', 'contact');

Route::post('pj', [PJController::class,'store'])->name('pj.store');

Route::get('/equipment', [EquipmentController::class,'store'])->name('eq.store');

Route::post('/equipment', [EquipmentController::class,'addItem'])->name('eq.addItem');


