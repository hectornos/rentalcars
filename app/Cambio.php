<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cambio extends Model
{
    protected $table = 'cambios';
    protected $fillable = ['id','nombre'];
    //-----------------------------------------------------------------------
    //El tipo de cambio puede ser compartido por varios vehiculos
    //-----------------------------------------------------------------------
    public function vehiculos(){
    	return $this->hasMany('App\Vehiculo');
    }
}
