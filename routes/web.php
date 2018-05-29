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
})->name('welcome');
Route::get('/home', function () {
    return view('home');
})->name('home');
//Rutas para la tabla Cliente
Route::get('/Cliente', 'ClienteController@index')->name('Cliente.index');
Route::get('/Cliente/crear', 'ClienteController@create')->name('Cliente.create');
Route::post('/Cliente', 'ClienteController@store')->name('Cliente.store');
Route::post('/Cliente2', 'ClienteController@store2')->name('Cliente.store2');
Route::get('/Cliente/{id}', 'ClienteController@show')->name('Cliente.show');
Route::get('/Cliente/{id}/editar', 'ClienteController@edit')->name('Cliente.edit');
Route::put('/Cliente/{id}','ClienteController@update')->name('Cliente.update');
Route::delete('/Cliente/{id}', 'ClienteController@destroy')->name('Cliente.destroy');
Route::get('/Cliente/{id}/alquileres', 'ClienteController@listaralc')->name('Cliente.alquileres');
Route::get('/Cliente/{id}/incidencias', 'ClienteController@listarinc')->name('Cliente.incidencias');
Route::get('/Cliente/{id}/pdf', 'ClienteController@pdf')->name('Cliente.pdf');
Route::get('/Cliente/{id}/view', 'ClienteController@view')->name('Cliente.view');
Route::get('/Cliente/{vehiculo_id}/{cliente_id}/alquilar', 'ClienteController@alquilar')->name('Cliente.alquilar');
Route::get('/ClienteCancelado', 'ClienteController@cancel')->name('Cliente.cancel');
Route::post('/Cliente/Login', 'ClienteController@login')->name('Cliente.login');


//Rutas para la tabla Vehiculos
Route::get('/Vehiculo', 'VehiculoController@index')->name('Vehiculo.index');
Route::get('/Vehiculo/crear', 'VehiculoController@create')->name('Vehiculo.create');
Route::post('/Vehiculo', 'VehiculoController@store')->name('Vehiculo.store');
Route::get('/Vehiculo/{id}', 'VehiculoController@show')->name('Vehiculo.show');
Route::get('/Vehiculo/{id}/editar', 'VehiculoController@edit')->name('Vehiculo.edit');
Route::put('/Vehiculo/{id}','VehiculoController@update')->name('Vehiculo.update');
Route::delete('/Vehiculo/{id}', 'VehiculoController@destroy')->name('Vehiculo.destroy');
Route::get('/Vehiculo/{id}/alquileres', 'VehiculoController@listaralc')->name('Vehiculo.alquileres');
Route::get('/Vehiculo/{id}/averias', 'VehiculoController@listarave')->name('Vehiculo.averias');
Route::get('/Vehiculo/{id}/pdf', 'VehiculoController@pdf')->name('Vehiculo.pdf');
Route::get('/Vehiculo/{id}/alquilar', 'VehiculoController@alquilar')->name('Vehiculo.alquilar');
Route::get('/Vehiculo/{id}/view', 'VehiculoController@view')->name('Vehiculo.view');
//Route::get('/Vehiculos/escoger', 'VehiculoController@escoger')->name('Vehiculo.escoger');
Route::get('/Vehiculos/elegir', 'VehiculoController@elegir')->name('Vehiculo.elegir');
Route::post('/Vehiculos/filtrar', 'VehiculoController@filtrar')->name('Vehiculo.filtrar');
Route::get('/VehiculoCancelado', 'VehiculoController@cancel')->name('Vehiculo.cancel');
//Route::get('/Vehiculos/elegir/{cliente_id}', 'VehiculoController@elegir')->name('Vehiculo.elegir');
//Rutas para la tabla cliente_vehiculo (Modelo Alquiler)
Route::get('/Alquiler', 'AlquilerController@index')->name('Alquiler.index');
Route::get('/Alquiler/crear', 'AlquilerController@create')->name('Alquiler.create');
Route::post('/Alquiler', 'AlquilerController@store')->name('Alquiler.store');
Route::get('/Alquiler/{id}', 'AlquilerController@show')->name('Alquiler.show');
Route::get('/Alquiler/{id}/editar', 'AlquilerController@edit')->name('Alquiler.edit');
Route::put('/Alquiler/{id}', 'AlquilerController@update')->name('Alquiler.update');
Route::delete('/Alquiler/{id}', 'AlquilerController@destroy')->name('Alquiler.destroy');
Route::get('/Alquiler/{id}/incidencias', 'AlquilerController@listarinc')->name('Alquiler.incidencias');
Route::get('/Alquiler/{id}/pdf', 'AlquilerController@pdf')->name('Alquiler.pdf');
Route::get('/Alquiler/{id}/pdf2', 'AlquilerController@pdf2')->name('Alquiler.pdf2');
Route::get('/AlquilerCancelado', 'AlquilerController@cancel')->name('Alquiler.cancel');
//Rutas para la tabla averias
Route::get('/Averia', 'AveriaController@index')->name('Averia.index');
Route::get('/Averia/crear/{vehiculo_id}', 'AveriaController@create')->name('Averia.create');
Route::post('/Averia', 'AveriaController@store')->name('Averia.store');
Route::get('/Averia/{id}', 'AveriaController@show')->name('Averia.show');
Route::get('/Averia/{id}/editar', 'AveriaController@edit')->name('Averia.edit');
Route::put('/Averia/{id}', 'AveriaController@update')->name('Averia.update');
Route::delete('/Averia/{id}', 'AveriaController@destroy')->name('Averia.destroy');
Route::get('/Averia/{id}/pdf', 'AveriaController@pdf')->name('Averia.pdf');
Route::get('/AveriaCancelado', 'AveriaController@cancel')->name('Averia.cancel');
//Rutas para la tabla incidencias
Route::get('/Incidencia', 'IncidenciaController@index')->name('Incidencia.index');
Route::get('/Incidencia/crear/{alquiler_id}', 'IncidenciaController@create')->name('Incidencia.create');
Route::post('/Incidencia', 'IncidenciaController@store')->name('Incidencia.store');
Route::get('/Incidencia/{id}', 'IncidenciaController@show')->name('Incidencia.show');
Route::get('/Incidencia/{id}/editar', 'IncidenciaController@edit')->name('Incidencia.edit');
Route::put('/Incidencia/{id}', 'IncidenciaController@update')->name('Incidencia.update');
Route::delete('/Incidencia/{id}', 'IncidenciaController@destroy')->name('Incidencia.destroy');
Route::get('/Incidencia/{id}/pdf', 'IncidenciaController@pdf')->name('Incidencia.pdf');
Route::get('/Incidencia/{id}/pdf', 'IncidenciaController@pdf')->name('Incidencia.pdf');
Route::get('/IncidenciaCancelado', 'IncidenciaController@cancel')->name('Incidencia.cancel');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
