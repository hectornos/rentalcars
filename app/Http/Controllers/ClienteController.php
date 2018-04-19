<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Incidencias as Incidencias;
use App\Vehiculo as Vehiculo;
use App\Cliente as Cliente;
use App\Averia as Averia;
use App\Incidencia as Incidencia;
use App\Alquiler as Alquiler;
use App\Http\Controllers\ClienteController as ClienteCont;
use App\Http\Controllers\Controller as Metodos;

class ClienteController extends Controller
{
	//Listado completo de los clientes
	public function index(Request $request) {
		$clientes = Cliente::all();
		$count = $clientes->count();
		return \View::make('vistaClientes',compact('clientes'),['count'=>$count]);
	}

	//Detalle de un cliente dado su id (primary key)
	public function show($id) {
		$cliente = Cliente::find($id);
		return \View::make('vistaDetCliente',compact('cliente'));
	}

	//Listar las alquileres de un cliente
	public function listaralc($id) {
		$cliente = Cliente::find($id);
		$alquileres = $cliente->alquileres;
		$count = count($alquileres);
		return \View::make('VistaAlquileres',compact('alquileres'),['count'=>$count]);
	}

	//Listar las incidencias de un cliente
	public function listarinc($id) {
		$cliente = Cliente::find($id);
		$incidencias = $cliente->incidencias;
		$count = count($incidencias);
		return \View::make('VistaIncidencias',compact('incidencias'),['count'=>$count]);
	}

}
