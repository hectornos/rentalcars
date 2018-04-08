<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
   	protected $table = 'incidencias';
    protected $fillable = ['id','alquiler_id','descripcion','resuelto'];
	//-----------------------------------------------------------------------
    //La averia se asocia a un vehiculo concreto y es de un tipo
    //-----------------------------------------------------------------------
   	public function alquiler(){
    	return $this->hasOne('App\Alquiler','id','alquiler_id');
    }

}
