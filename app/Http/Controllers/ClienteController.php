<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Incidencias as Incidencias;
use App\Vehiculo as Vehiculo;
use App\Cliente as Cliente;
use App\Averia as Averia;
use App\Incidencia as Incidencia;
use App\Alquiler as Alquiler;
use App\Http\Controllers\Controller as control;

class ClienteController extends Controller
{
	//Listado completo de los clientes
	public function index(Request $request) {
		$clientes = Cliente::all();
		return $clientes;
	}

	public function ordenar($modelo, $campo) {
        $modelo = ucfirst($modelo);
        $cursor = $modelo::orderBy($campo)->get();
        return $cursor;
	}
	
	public function orden() {
		$clientes = ordenar('Cliente', 'nombre');
		return $clientes;
	}



	//Listado completo de los clientes
	public function create() {
		$clientes = Cliente::all();
		return $clientes;
	}

	//Almacenar un nuevo cliente
	public function store(Request $request) {
		Cliente::create($request->all());
		$mensaje = "todo bien";
		return $mensaje;
	}

	//Detalle de un cliente dado su id (primary key)
	public function show($id) {
		$cliente = Cliente::find($id);
		return $cliente;
	}

	//Almacenar un nuevo cliente
	public function edit(Request $request) {
		Cliente::create($request->all());
		$mensaje = "todo bien";
		return $mensaje;
	}

	//Mandamos cambios en el cliente a la BD
	public function update(Request $request) {
        $cliente = Cliente::find($request->$id);
        return $cliente;
	}

	//Almacenar un nuevo cliente
	public function destroy(Request $request) {
		Cliente::create($request->all());
		$mensaje = "todo bien";
		return $mensaje;
	}


    public function ver(){
    	$clientes = Cliente::all();
    	return view('vistaVer',['clientes'=>$clientes]);
    }

    public function verIncidencias() {
    	//Supongo que quiero ver las incidencias del cliente 1
    	$cliente = Cliente::find(1);
    	return view('vistaIncidencias',['cliente'=>$cliente]);
	}
	
	public function verVehiculos() {
		$cliente = Cliente::find(1);
		return view('vistaVehiculosCli',['cliente'=>$cliente]);
	}
}
