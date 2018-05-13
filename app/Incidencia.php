<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*
El model incidencia corresponde a la tabla de incidencias de la base de datos.
Las incidencias están relacionadas con los alquileres, de modo que en un alquiler 
se pueden producir un número indeterminado de incidencias.
*/

class Incidencia extends Model
{
    protected $table = 'incidencias';
    //Podemos recoger los campos de la tabla con el request.
    protected $fillable = ['id','alquiler_id','descripcion','resuelto'];
	//-----------------------------------------------------------------------
    //La incidencia se relaciona con un alquiler, a través del campo id
    //-----------------------------------------------------------------------
   	public function alquiler(){
    	return $this->hasOne('App\Alquiler','id','alquiler_id');
    }

    public $timestamps = false;

    //-----------------------------------------------------------------------
    //El nombre con formato
    //-----------------------------------------------------------------------

    public function getDescAttribute() {
        return ucfirst(substr($this->descripcion,0,25));
    }

    public function getDescripAttribute() {
      return ucfirst($this->descripcion);
  }
}
