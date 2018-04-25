<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Incidencias as Incidencias;
use App\Vehiculo as Vehiculo;
use App\Cliente as Cliente;
use App\Averia as Averia;
use App\Incidencia as Incidencia;
use App\Alquiler as Alquiler;
use App\Http\Controllers\ClienteController as ClienteCont;
use App\Http\Controllers\Controller as Metodos;
use Barryvdh\DomPDF\Facade as PDF;


class ClienteController extends Controller
{
	//Listado completo de los clientes
	public function index(Request $request) {
		if ($request->has('criterio')){
			$orden = $request->criterio;
			if ($orden == 'alquileres' ){
				//QUERY: 'select clientes.*, count(cliente_id) as cli_count from clientes left join cliente_vehiculo on clientes.id = cliente_vehiculo.cliente_id group by clientes.id order by cli_count'));
				$clientes = Cliente::join('cliente_vehiculo', 'clientes.id','=','cliente_vehiculo.cliente_id','left outer')
														->select('clientes.*', DB::raw('count(cliente_id) as cli_count'))
														->groupBy('clientes.id')
														->orderBy('cli_count','desc')
														->get();
			}elseif ($orden == 'incidencias'){
				//QUERY: 'select c.*, count(alquiler_id) as inc_count from incidencias i left join cliente_vehiculo cv on i.alquiler_id = cv.id left join clientes c on cv.cliente_id = c.id group by c.id order by incidencias_count'));
				$clientes = Cliente::join('cliente_vehiculo', 'clientes.id', '=', 'cliente_vehiculo.cliente_id','left outer')
														->join('incidencias', 'cliente_vehiculo.id', '=', 'incidencias.alquiler_id', 'left outer' )
														->groupBy('clientes.id')
														->orderBy('inc_count','desc')
														->select('clientes.*', DB::raw('count(alquiler_id) as inc_count'))
														->get();
			}else{
				$clientes = Cliente::orderBy($orden)->get();
			}
		}else{
			$clientes = Cliente::all();
		}
		$count = count($clientes);
		return \View::make('Cliente/rejillaClientes',compact('clientes'),['count'=>$count]);
	}

	//Pantalla para crear un cliente nuevo
	public function create() {
		return \View::make('Cliente/createCliente');
	}

	//Metodo de añadir un cliente
	public function store(Request $request) {
		if ($request->has('cancel')) {
			$alerta = 'Cancelado';
			$mensaje = 'Operacion cancelada';
		} else {
			Cliente::create($request->all());
			$alerta = 'Creado';
			$mensaje = $request->nombre. " ha sido creado.";
		}
		return redirect(url('/Cliente'))->with($alerta,$mensaje);
	}

	//Edita un cliente
	public function edit($id) {
		
		$cliente = Cliente::find($id);
		return \View::make('Cliente/editCliente',compact('cliente'));
	}

	//Almacena los cambios realizados en el cliente
	public function update(Request $request) {
		if ($request->has('cancel')) {
			$alerta = 'Cancelado';
			$mensaje = 'Operacion cancelada';
		} else {
            Cliente::find($request->id)->update($request->all());
            $alerta = 'Modificado';
            $mensaje = 'Registro modificado';
		}
		return redirect(url('/Cliente'))->with($alerta,$mensaje);
	}

	//Detalle de un cliente dado su id (primary key)
	public function show($id) {
		$cliente = Cliente::find($id);
		return \View::make('Cliente/showCliente',compact('cliente'));
	}

	//Metodo de borrar un cliente
	public function destroy(Request $request) {
		if ($request->has('cancel')) {
			$alerta = 'Cancelado';
			$mensaje = 'Operacion cancelada';
		} else {
			$cliente = Cliente::find($request->id);
			$cliente -> delete();
			$alerta = 'Borrado';
			$mensaje = $request->nombre. " ha sido borrado.";
		}
		return redirect(url('/Cliente'))->with($alerta,$mensaje);
	}

	//Listar las alquileres de un cliente
	public function listaralc($id) {
		$cliente = Cliente::find($id);
		$alquileres = $cliente->alquileres;
		$count = count($alquileres);
		$ordenar = false; //Si cargo un listado parcial de alquileres, no se debe poder ordenar.
		$subtitulo = 'Alquileres del cliente: '.$cliente->nombre.' '.$cliente->apellido;
		return \View::make('Alquiler/rejillaAlquileres',compact('alquileres'),['count'=>$count, 'ordenar'=>$ordenar, 'subtitulo'=>$subtitulo]);
	}

	//Listar las incidencias de un cliente
	public function listarinc($id) {
		$cliente = Cliente::find($id);
		$incidencias = $cliente->incidencias;
		$count = count($incidencias);
		$ordenar = false;
		$subtitulo = 'Incidencias del cliente: '.$cliente->nombre.' '.$cliente->apellido;
		return \View::make('Incidencia/rejillaIncidencias',compact('incidencias'),['count'=>$count, 'ordenar'=>$ordenar, 'subtitulo'=>$subtitulo]);
	}
	
	//Imprime detalles de un cliente
	public function pdf($id) {
		$cliente = Cliente::find($id);
		echo ('Aqui se imprimiria el cliente');
	}

}
