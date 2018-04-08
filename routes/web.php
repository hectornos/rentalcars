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

Route::get('/Pruebas','VehiculoController@jsonPrueba')->name('Vehiculo.pruebas');

Route::get('/Ver','ClienteController@ver')->name('Cliente.ver');

Route::get('/Averias', 'AveriaController@index')->name('Averia.index');

Route::get('/Incidencias', 'ClienteController@verIncidencias')->name('Cliente.incidencias');
