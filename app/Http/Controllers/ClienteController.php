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
	/*Listado completo de clientes.
    @ Recibe: Criterios de ordenación o de filtro.
    @ Devuelve: Objeto clientes y count de clientes.
    */
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
				$clientes = Cliente::
				join('cliente_vehiculo', 'clientes.id', '=', 'cliente_vehiculo.cliente_id','left outer')
														->join('incidencias', 'cliente_vehiculo.id', '=', 'incidencias.alquiler_id', 'left outer' )
														->groupBy('clientes.id')
														->orderBy('inc_count','desc')
														->select('clientes.*', DB::raw('count(alquiler_id) as inc_count'))
														->get();
			}else{
				$clientes = Cliente::orderBy($orden)->get();
			}
		}else{ //Sin ordenar...
			if ($request->busqueda!=""){
				$clientes = Cliente::where($request->filtro,$request->busqueda)
															->orderBy('nombre', 'desc')
																	->get();               

			}else{
				//POR AQUI PASA LA PRIMERA VEZ, TAL CUAL CARGA LA APLICACION
				$clientes = Cliente::all();               
			}              
			
		}
		$count = count($clientes);
		return \View::make('Cliente/rejillaClientes',compact('clientes'),['count'=>$count]);
	}

	/*Pantalla para crear un cliente nuevo
    @ Recibe:
    @ Devuelve:  */
	public function create() {
		return \View::make('Cliente/createCliente');
	}

	/*Metodo de añadir un cliente
    @ Recibe: Request con campos a insertar.
    @ Devuelve: */
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

	/*Pantalla para editar un cliente
    @ Recibe: id del cliente
    @ Devuelve: cliente editado*/
	public function edit($id) {
		$cliente = Cliente::find($id);
		return \View::make('Cliente/editCliente',compact('cliente'));
	}

	/*Almacena los cambios realizados en el cliente
    @ Recibe: Request con campos a editar
    @ Devuelve: */
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

	/*Detalle de un cliente para su borrado
    @ Recibe: id del cliente
    @ Devuelve: objeto cliente a borrar*/
	public function show($id) {
		$cliente = Cliente::find($id);
		return \View::make('Cliente/showCliente',compact('cliente'));
	}

	/*Detalle de un cliente para su borrado
    @ Recibe: id del cliente
    @ Devuelve: objeto cliente a ver*/
	public function view($id) {
		$cliente = Cliente::find($id);
		return \View::make('Cliente/viewCliente',compact('cliente'));
	}

	/*Borrado de un cliente
    @ Recibe: request con cliente a borrar
    @ Devuelve: */
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

	/*Listar los alquileres de un cliente
    @ Recibe: id del cliente
    @ Devuelve: Objeto alquileres, count de alquileres, boolean ordenar, subtitulo*/
	public function listaralc($id) {
		$cliente = Cliente::find($id);
		$alquileres = $cliente->alquileres;
		$count = count($alquileres);
		$ordenar = false; //Si cargo un listado parcial de alquileres, no se debe poder ordenar.
		$subtitulo = 'Alquileres del cliente: '.$cliente->nom.' '.$cliente->ape;
		return \View::make('Alquiler/rejillaAlquileres',compact('alquileres'),['count'=>$count, 'ordenar'=>$ordenar, 'subtitulo'=>$subtitulo]);
	}

	/*Listar las incidencias de un cliente
    @ Recibe: id del cliente
    @ Devuelve: Objeto incidencias, count de incidencias, boolean ordenar, subtitulo*/
	public function listarinc($id) {
		$cliente = Cliente::find($id);
		$incidencias = $cliente->incidencias;
		$count = count($incidencias);
		$ordenar = false;
		$subtitulo = 'Incidencias del cliente: '.$cliente->nom.' '.$cliente->ape;
		return \View::make('Incidencia/rejillaIncidencias',compact('incidencias'),['count'=>$count, 'ordenar'=>$ordenar, 'subtitulo'=>$subtitulo]);
	}
	
	/*Alquila un vehiculo
    @ Recibe: id del cliente, id del vehiculo
    @ Devuelve: */
    public function alquilar($vehiculo_id, $cliente_id) {
		$vehiculo = Vehiculo::find($vehiculo_id);
		$cliente = Cliente::find($cliente_id);
		$fecha = array('fecha'=>date('Y-m-d'));
		$cliente->vehiculos()->save($vehiculo,$fecha);
		$vehiculo->disponible = '0';
		$vehiculo->save();
		echo ('Vehiculo alquilado!!!');
    }

	/*Imprimir en pdf un cliente
    @ Recibe: id del cliente
    @ Devuelve: pdf creado*/
	public function pdf($id) {
		$cliente = Cliente::find($id);
		echo ('Aqui se imprimiria el cliente');
	}

}
