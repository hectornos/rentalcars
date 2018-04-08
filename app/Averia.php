<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Averia extends Model
{
	protected $table = 'averias';
    protected $fillable = ['id','vehiculo_id','tipoaveria_id','descripcion','fecha'];
	//-----------------------------------------------------------------------
    //La averia se asocia a un vehiculo concreto y es de un tipo
    //-----------------------------------------------------------------------
   	public function vehiculo(){
    	return $this->hasOne('App\Vehiculo','id','vehiculo_id');
    }

    public function tipoaveria(){
    	return $this->hasOne('App\Tipoaveria','id','tipoaveria_id');
    }
}