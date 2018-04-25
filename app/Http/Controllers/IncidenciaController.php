<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Incidencias as Incidencias;
use App\Vehiculo as Vehiculo;
use App\Cliente as Cliente;
use App\Averia as Averia;
use App\Incidencia as Incidencia;
use App\Alquiler as Alquiler;

class IncidenciaController extends Controller
{
    //Listado completo de incidencias
    public function index (Request $request) {
      if ($request->has('criterio')){
        $orden = $request->criterio;
        if ($orden == 'fecha'){
          $incidencias = Incidencia::join('cliente_vehiculo as c', 'c.id','=','incidencias.alquiler_id')
                                    ->orderBy('c.fecha', 'asc')
                                    ->select('incidencias.*')
                                    ->get();    
        }elseif ($orden == 'conductor') {
          $incidencias = Incidencia::join('cliente_vehiculo', 'incidencias.alquiler_id','=','cliente_vehiculo.id')
                                    ->join('clientes', 'cliente_vehiculo.cliente_id', '=', 'clientes.id')
														        ->select('incidencias.*')
                                    ->orderBy('clientes.apellido','asc')->get();
        }elseif ($orden == 'matricula') {
          $incidencias = Incidencia::join('cliente_vehiculo', 'incidencias.alquiler_id','=','cliente_vehiculo.id')
                                    ->join('vehiculos', 'cliente_vehiculo.vehiculo_id', '=', 'vehiculos.id')
                                    ->select('incidencias.*')
                                    ->orderBy('vehiculos.matricula','asc')->get();
        }else{
          $incidencias = Incidencia::orderBy($orden)->get();
        }
      }else{
        $incidencias = Incidencia::all();
        
      }
      $ordenar = true;
      $count = $incidencias->count();
      return \View::make('Incidencia/rejillaIncidencias',compact('incidencias'),['count'=>$count, 'ordenar'=>$ordenar]);
  }
  
  //Detalle de un alquiler dado su id (primary key)
  public function create($alquiler_id) {
    $alquiler = Alquiler::find($alquiler_id);
    return \View::make('Incidencia/createIncidencia',['alquiler'=>$alquiler]);
  }

  //Detalle de un alquiler dado su id (primary key)
  public function show($id) {
    $incidencia = Incidencia::find($id);
    return \View::make('Incidencia/showIncidencia',compact('incidencia'));
  }

  //Metodo de añadir una incidencia
	public function store(Request $request) {
		if ($request->has('cancel')) {
			$alerta = 'Cancelado';
			$mensaje = 'Operacion cancelada';
		} else {
      $incidencia = Incidencia::create(['alquiler_id' => $request->alquiler_id, 'descripcion'=>$request->descripcion]);
			$alerta = 'Creado';
			$mensaje = "Vehiculo con matricula ".$request->matrciula. " ha sido creado.";
		}
		return redirect(url('/Vehiculo'))->with($alerta,$mensaje);
    }


  //Metodo de borrar un alquiler
  public function destroy(Request $request) {
    if ($request->has('cancel')) {
      $alerta = 'Cancelado';
      $mensaje = 'Operacion cancelada';
    } else {
      $incidencia = Incidencia::find($request->id);
      $incidencia -> delete();
      $alerta = 'Borrado';
      $mensaje = "Incidencia borrada.";
    }
    return redirect(url('/Incidencia'))->with($alerta,$mensaje);
  }

  //Editar un alquiler
  public function edit($id) {
      $incidencia = Incidencia::find($id);
      return \View::make('Incidencia/editIncidencia',compact('incidencia'));
  }

  //Almacena los cambios realizados en el vehiculo
  public function update(Request $request) {
    if ($request->has('cancel')) {
      $alerta = 'Cancelado';
      $mensaje = 'Operacion cancelada';
  } else {
      Incidencia::find($request->id)->update($request->all());
      $alerta = 'Modificado';
      $mensaje = 'Registro modificado';
  }
    return redirect(url('/Incidencia'))->with($alerta,$mensaje);
  }
  
}
