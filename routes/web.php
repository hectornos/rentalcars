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

     Route::get('/ClienteNombre', 'ClienteController@ordenar')->name('Cliente.ordNombre');
 
     //Rutas para la tabla Vehiculos
     Route::get('/Vehiculo', 'VehiculoController@index')->name('Vehiculo.index');
     Route::get('/Vehiculo/crear', 'VehiculoController@create')->name('Vehiculo.create');
     Route::post('/Vehiculo', 'VehiculoController@store')->name('Vehiculo.store');
     Route::get('/Vehiculo/{id}', 'VehiculoController@show')->name('Vehiculo.show');
     Route::get('/Vehiculo/{id}/editar', 'VehiculoController@edit')->name('Vehiculo.edit');
     Route::put('/Vehiculo/{id}','VehiculoController@update')->name('Vehiculo.update');
     Route::delete('/Vehiculo/{id}', 'VehiculoController@destroy')->name('Vehiculo.destroy');
 
     //Rutas para Incidencias
     Route::get('/Incidencias', 'IncidenciaController@index')->name('Incidencia.index');
     Route::get('/Incidencia/{id}', 'IncidenciaController@detalle')->name('Incidencia.detalle');
 
 
     Route::get('/Alquileres', 'AlquilerController@index')->name('Alquiler.index');
     Route::get('/Alquiler/{id}', 'AlquilerController@detalle')->name('Alquiler.detalle');
 
 
     Route::get('/Averias', 'AveriaController@index')->name('Averia.index');
     Route::get('/Averia/{id}', 'AveriaController@detalle')->name('Averia.detalle');
 
     Route::get('/Token', 'Controller@token')->name('obtenerToken');
