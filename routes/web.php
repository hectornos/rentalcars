<?php

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


     //Rutas para la tabla Cliente
     Route::get('/Cliente', 'ClienteController@index')->name('Cliente.index');
     Route::get('/Cliente/crear', 'ClienteController@create')->name('Cliente.create');
     Route::post('/Cliente', 'ClienteController@store')->name('Cliente.store');
     Route::get('/Cliente/{id}', 'ClienteController@show')->name('Cliente.show');
     Route::get('/Cliente/{id}/editar', 'ClienteController@edit')->name('Cliente.edit');
     Route::put('/Cliente/{id}','ClienteController@update')->name('Cliente.update');
     Route::delete('/Cliente/{id}', 'ClienteController@destroy')->name('Cliente.destroy');
 
     //Rutas para la tabla Vehiculos
     Route::get('/Vehiculo', 'VehiculoController@index')->name('Vehiculo.index');
     Route::get('/Vehiculo/crear', 'VehiculoController@create')->name('Vehiculo.create');
     Route::post('/Vehiculo', 'VehiculoController@store')->name('Vehiculo.store');
     Route::get('/Vehiculo/{id}', 'VehiculoController@show')->name('Vehiculo.show');
     Route::get('/Vehiculo/{id}/editar', 'VehiculoController@edit')->name('Vehiculo.edit');
     Route::put('/Vehiculo/{id}','VehiculoController@update')->name('Vehiculo.update');
     Route::delete('/Vehiculo/{id}', 'VehiculoController@destroy')->name('Vehiculo.destroy');
 
    //Rutas para la tabla cliente_vehiculo (Modelo Alquiler)
     Route::get('/Alquiler', 'AlquilerController@index')->name('Alquiler.index');
     Route::get('/Alquiler/crear', 'AlquilerController@create')->name('Alquiler.create');
     Route::post('/Alquiler', 'AlquilerController@store')->name('Alquiler.store');
     Route::get('/Alquiler/{id}', 'AlquilerController@show')->name('Alquiler.show');
     Route::get('/Alquiler/{id}/editar', 'AlquilerController@edit')->name('Alquiler.edit');
     Route::put('/Alquiler/{id}', 'AlquilerController@update')->name('Alquiler.update');
     Route::delete('/Alquiler/{id}', 'AlquilerController@destroy')->name('Alquiler.destroy');
 
 
     //Rutas para la tabla averias
     Route::get('/Averia', 'AveriaController@index')->name('Averia.index');
     Route::get('/Averia/crear', 'AveriaController@create')->name('Averia.create');
     Route::post('/Averia', 'AveriaController@store')->name('Averia.store');
     Route::get('/Averia/{id}', 'AveriaController@show')->name('Averia.show');
     Route::get('/Averia/{id}/editar', 'AveriaController@edit')->name('Averia.edit');
     Route::put('/Averia/{id}', 'AveriaController@update')->name('Averia.update');
     Route::delete('/Averia/{id}', 'AveriaController@destroy')->name('Averia.destroy');
 
 
     Route::get('/Token', 'Controller@token')->name('obtenerToken');

    //Rutas para la tabla incidencias
     Route::get('/Incidencia', 'IncidenciaController@index')->name('Incidencia.index');
     Route::get('/Incidencia/crear', 'IncidenciaController@create')->name('Incidencia.create');
     Route::post('/Incidencia', 'IncidenciaController@store')->name('Incidencia.store');
     Route::get('/Incidencia/{id}', 'IncidenciaController@show')->name('Incidencia.show');
     Route::get('/Incidencia/{id}/editar', 'IncidenciaController@edit')->name('Incidencia.edit');
     Route::put('/Incidencia/{id}', 'IncidenciaController@update')->name('Incidencia.update');
     Route::delete('/Incidencia/{id}', 'IncidenciaController@destroy')->name('Incidencia.destroy');
 