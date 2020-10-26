<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

//Rutas portegidas con el middleware auth
Route::group(['middleware' => ['auth','verified']], function () {

    // Ruta de vacantes
    Route::get('/vacantes', 'VacanteController@index')->name('vacantes.index');
    Route::get('/vacantes/create', 'VacanteController@create')->name('vacantes.create');
    Route::post('/vacantes','VacanteController@store')->name('vacantes.store');
    Route::delete('/vacantes/{vacante}','VacanteController@destroy')->name('vacantes.destroy');
    Route::get('/vacantes/{vacante}/edit','VacanteController@edit')->name('vacantes.edit');
    Route::put('/vacantes/{vacante}','VacanteController@update')->name('vacantes.update');

    // Subir imagenes
    Route::post('/vacantes/imagen','VacanteController@imagen')->name('vacantes.imagen');
    Route::post('/vacantes/borrarimagen','VacanteController@borrarimagen')->name('vacantes.borrar');

    //Cambiar estado de la vacante
    Route::post('/vacante/{vacante}','VacanteController@estado')->name('vacantes.estado');

    //Notificaciones
    Route::get('/notificaciones','NotificacionesController')->name('notificaciones');


});

//Enviar datos para una vacante
Route::get('/candidatos/{id}', 'CandidatoController@index')->name('candidatos.index');
Route::post('/candidatos/store','CandidatoController@store')->name('candidatos.store');

// Muestra las vacantes en el frontend sin autorizacion
Route::get('/vacantes/{vacante}', 'VacanteController@show')->name('vacantes.show');




