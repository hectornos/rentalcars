<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Combustible extends Model
{
    protected $table = 'combustibles';
    protected $fillable = ['id','nombre'];

    //-----------------------------------------------------------------------
    //El tipo de combustible puede ser compartido por varios vehiculos
    //-----------------------------------------------------------------------
    public function vehiculos(){
    	return $this->hasMany('App\Vehiculo');
    }
}
