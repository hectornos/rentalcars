<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehiculo as Vehiculo;
use App\Cliente as Cliente;
use App\Averia as Averia;
use App\Incidencia as Incidencia;
use App\Alquiler as Alquiler;
use App\Tipoaveria as Tipoaveria;

class AveriaController extends Controller
{
  /*Listado completo de averias.
  @ Recibe: Criterios de ordenación o de filtro.
  @ Devuelve: Objeto averias y count de averias.
  */
  public function index (Request $request) {
    if ($request->has('criterio')){
      $orden=$request->criterio;
      if ($orden == 'tipo'){
          $averias = Averia::join('tipoaverias', 'averias.tipoaveria_id','=','tipoaverias.id')
                              ->select('averias.*')
                              ->orderBy('tipoaverias.nombre','desc')->get();
      }elseif ($orden == 'matricula') {
          $averias = Averia::join('vehiculos', 'vehiculos.id','=','averias.vehiculo_id')
                              ->select('averias.*')
                              ->orderBy(\DB::raw('substr(vehiculos.matricula,5,3)'))
                              ->orderBy(\DB::raw('substr(vehiculos.matricula,1,4)'))
                              ->paginate(8);
      }else{
          $averias = Averia::orderBy($orden)->paginate(8);
      }
    }else{
      if ($request->busqueda!=""){
          if ($request->filtro == 'matricula') {
            $averias = Averia::join('vehiculos','averias.vehiculo_id','=','vehiculos.id')
                                  ->where('vehiculos.matricula',$request->busqueda)
                                  ->orderBy('fecha','desc')
                                  ->paginate(8);
          }elseif ($request->filtro == 'tipo') {
            $averias = Averia::join('tipoaverias', 'averias.tipoaveria_id','=','tipoaverias.id')
                                  ->where('tipoaverias.nombre',$request->busqueda)
                                  ->orderBy('fecha','desc')
                                  ->paginate(8);
          }
      }else{
          if ($request->date1 != "" && $request->date2 != ""){
            $averias = Averia::whereBetween('fecha',[$request->date1, $request->date2])
                              ->orderBy('fecha', 'desc')
                              ->paginate(8);
          }else{
            //POR AQUI PASA LA PRIMERA VEZ, TAL CUAL CARGA LA APLICACION
            $averias = Averia::paginate(8); 
          }	              
      }   
    }
      $count = $averias->count();
      $ordenar = true;
      return \View::make('Averia/rejillaAverias',compact('averias'),['count'=>$count, 'ordenar'=>$ordenar]);
  }

  /*Pantalla para crear un averia nueva
  @ Recibe:
  @ Devuelve: marcas, tipos, cambios, combustibles y colores */
  public function create($vehiculo_id) {
    $vehiculo = Vehiculo::find($vehiculo_id);
    $tipoaverias = Tipoaveria::all();
    return \View::make('Averia/createAveria', compact('tipoaverias'), ['vehiculo'=>$vehiculo]);
  }
  
  
  /*Metodo de añadir un averia
  @ Recibe: Request con campos a insertar.
  @ Devuelve: */
  public function store(Request $request) {
    if ($request->has('cancel')) {
      $alerta = 'Cancelado';
      $mensaje = 'Operacion cancelada';
    } else {
      Averia::create($request->all());
      //Ademas ponemos el coche en no disponible.
      $vehiculo = Vehiculo::find($request->vehiculo_id);
      if ($vehiculo->disponible == '1'){
        $vehiculo->disponible='0';
        $vehiculo->save();
      }
      $alerta = 'Creado';
      $mensaje = "Averia ".$request->matrciula. " añadida.";
    }
    return redirect(url('/Vehiculo'))->with($alerta,$mensaje);
  }

  /*Pantalla para editar un averia
  @ Recibe: id del averia.
  @ Devuelve: marcas, tipos, cambios, combustibles y colores*/
	public function edit($id) {
    $averia = Averia::find($id);
    $tipoaverias = Tipoaveria::all();
    return \View::make('Averia/editAveria',compact('averia'),['tipoaverias' => $tipoaverias]);
  }

  /*Almacena los cambios realizados en el averia
  @ Recibe: Request con campos a editar
  @ Devuelve: */
  public function update(Request $request) {
      if ($request->has('cancel')) {
        $alerta = 'Cancelado';
        $mensaje = 'Operacion cancelada';
      } else {
          Averia::find($request->id)->update($request->all());
          $alerta = 'Modificado';
          $mensaje = 'Registro modificado';
      }
    return redirect(url('/Averia'))->with($alerta,$mensaje);
  }

  /*Detalle de un averia para su borrado
  @ Recibe: id del averia
  @ Devuelve: objeto averia a borrar*/
  public function show($id) {
      $averia = Averia::find($id);
      return \View::make('Averia/showAveria',compact('averia'));
  }

  /*Borrado de un averia
  @ Recibe: request con averia a borrar
  @ Devuelve: */
  public function destroy(Request $request) {
    if ($request->has('cancel')) {
      $alerta = 'Cancelado';
      $mensaje = 'Operacion cancelada';
    } else {
      $averia = Averia::find($request->id);
      $averia -> delete();
      $alerta = 'Borrado';
      $mensaje = "Averia borrada.";
    }
    return redirect(url('/Averia'))->with($alerta,$mensaje);
  }

  /*Imprimir en pdf un averia
  @ Recibe: id del averia
  @ Devuelve: pdf creado*/
  public function pdf($id) {
    $averia = Averia::find($id);
      echo $averia;
  }

		/*Cancela operación, lleva al index.
    @ Recibe: 
    @ Devuelve: */
    public function cancel() {
      $alerta = 'Cancelado';
      $mensaje = 'Has cancelado la operación';
      $averias = Averia::all();
      return redirect(url('/Averia'))->with($alerta,$mensaje,$averias);
    }
}
