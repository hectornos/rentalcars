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
	/*Checkeamos si existe el cliente.
    @ Recibe: DNI.
    @ Devuelve: Pantalla con datos del cliente.
    */
	public function login(Request $request) {
		$dni = $request->dni;
		$clientes = Cliente::where('dni',$dni)->get();
		if ($clientes->count()<1) {
			return \View::make('Cliente/createCliente2',compact('dni'));
		} else {
			$cliente = Cliente::where('dni',$dni)->first();
			if ($cliente->rol == 'user') {
				return \View::make('Cliente/editCliente2',compact('cliente'));
			} else {
				return \View::make('home',compact('cliente'));
			}
		}
	}

	/*Editamos los datos del cliente.
    @ Recibe: cliente.
    @ Devuelve: Pantalla con datos del cliente.
    */
	public function editLogin($id) {
		$cliente = Cliente::find($id);
		return \View::make('Cliente/editCliente2',compact('cliente'));
	}

	/*Listado completo de clientes.
    @ Recibe: Criterios de ordenación o de filtro.
    @ Devuelve: Objeto clientes y count de clientes.
    */
	public function index(Request $request) {
        //Si lo que queremos es imprimir...
        if ($request->has('imp')){
          if ($request->busqueda!=""){
			  $clientes = Cliente::where($request->filtro,$request->busqueda)
                                      -paginate(8);
              $file = 'clientes'.$request->filtro.'-'.$request->busqueda.'.pdf';
          }else{
              $clientes = Cliente::all();
              $file = 'clientes.pdf';
          }
          $pdf = PDF::loadView('pdf.clientesPDF',compact('clientes'))->setPaper('a4', 'landscape');
          return $pdf->download($file);
      }
      
		if ($request->has('criterio')){
			$orden = $request->criterio;
			if ($orden == 'alquileres' ){
				//QUERY: 'select clientes.*, count(cliente_id) as cli_count from clientes left join cliente_vehiculo on clientes.id = cliente_vehiculo.cliente_id group by clientes.id order by cli_count'));
				$clientes = Cliente::join('cliente_vehiculo', 'clientes.id','=','cliente_vehiculo.cliente_id','left outer')
														->select('clientes.*', DB::raw('count(cliente_id) as cli_count'))
														->groupBy('clientes.id')
														->orderBy('cli_count','desc')
														->paginate(8);
			}elseif ($orden == 'incidencias'){
				//QUERY: 'select c.*, count(alquiler_id) as inc_count from incidencias i left join cliente_vehiculo cv on i.alquiler_id = cv.id left join clientes c on cv.cliente_id = c.id group by c.id order by incidencias_count'));
				$clientes = Cliente::join('cliente_vehiculo', 'clientes.id', '=', 'cliente_vehiculo.cliente_id','left outer')
														->join('incidencias', 'cliente_vehiculo.id', '=', 'incidencias.alquiler_id', 'left outer' )
														->groupBy('clientes.id')
														->orderBy('inc_count','desc')
														->select('clientes.*', DB::raw('count(alquiler_id) as inc_count'))
														->paginate(8);
			}else{
				$clientes = Cliente::orderBy($orden)->paginate(8);
			}
		}else{ //Sin ordenar...
			if ($request->busqueda!=""){
				$clientes = Cliente::where($request->filtro,$request->busqueda)
															->orderBy('nombre', 'desc')
																	->paginate(8);               

			}else{
				//POR AQUI PASA LA PRIMERA VEZ, TAL CUAL CARGA LA APLICACION
				$clientes = Cliente::paginate(8);               
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
    @ Devuelve: a la rejilla de los clientes*/
	public function store(Request $request) {
		Cliente::create($request->all());
		$alerta = 'Creado';
		$mensaje = $request->nombre. " añadido.";
		return redirect(url('/Cliente'))->with($alerta,$mensaje);
	}

	/*Metodo de añadir un cliente desde pantalla usuario
    @ Recibe: Request con campos a insertar.
    @ Devuelve: Vista del cliente para continuar al alquiler*/
	public function store2(Request $request) {
		Cliente::create($request->all());
		$cliente = Cliente::where('dni',$request->dni)->first();
		return \View::make('Cliente/editCliente2',compact('cliente'));
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
		Cliente::find($request->id)->update($request->all());
		$alerta = 'Modificado';
		$mensaje = $request->nombre.' '.$request->apellido.' modificado';
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
		$alquileres = Alquiler::join('clientes', 'clientes.id', '=', 'cliente_vehiculo.cliente_id')
								->select('cliente_vehiculo.*')
                                ->where('cliente_vehiculo.cliente_id', '=', $id)
                                ->paginate(8);
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
		$incidencias = Incidencia::join('cliente_vehiculo', 'incidencias.alquiler_id', '=', 'cliente_vehiculo.id')
							->join('clientes', 'cliente_vehiculo.cliente_id', '=', 'clientes.id')
							->select('incidencias.*')
							->where('cliente_id',$id)
							->paginate(8);
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
		//El vehiculo alquilado pasa a estar no disponible.
		$vehiculo->disponible = '0';
		$vehiculo->save();
		$alquiler = Alquiler::orderBy('fecha','desc')->first();
		
        return \View::make('Alquiler/viewAlquiler',compact('alquiler'));
    }

	/*Imprimir en pdf un cliente
    @ Recibe: id del cliente
    @ Devuelve: pdf creado*/
    public function pdf($id) {
        $cliente = Cliente::find($id);
		$pdf = PDF::loadView('pdf.clientePDF',compact('cliente'));
        return $pdf->stream($cliente->nom.' '.$cliente->ape.'detalle.pdf');
    }

	
	/*Cancela operación, lleva al index.
    @ Recibe: Request con mensaje a mostrar
    @ Devuelve: */
	public function cancel(Request $request) {
		$alerta = 'Cancelado';
		$mensaje = $request->mensaje;
		$clientes = Cliente::all();
		return redirect(url('/Cliente'))->with($alerta,$mensaje,$clientes);
	}


}
