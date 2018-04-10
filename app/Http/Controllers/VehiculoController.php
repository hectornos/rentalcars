<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehiculo as Vehiculo;
use App\Cliente as Cliente;
use App\Averia as Averia;
use App\Incidencia as Incidencia;
use App\Alquiler as Alquiler;


class VehiculoController extends Controller
{
    //Listado completo de vehiculos
    public function index() {
    	$vehiculos = Vehiculo::all();
        return $vehiculos;
    }

    //Detalle de un vehiculo dado su id (primary key)
    public function show($id) {
		$vehiculo = Vehiculo::find($id);
		return $vehiculo;
    }
    
    //Listado de vehiculos por modelo
	public function buscarModelo($modelo) {
		$vehiculo = Vehiculo::where(['modelo' => $modelo]);
		return $vehiculo;
    }
    
        //Listado de vehiculos por modelo
	public function buscarMatricula($matricula) {
		$vehiculo = Vehiculo::where(['matricula' => $matricula]);
		return $vehiculo;
	}
}
