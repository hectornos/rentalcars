<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = 'colors';
    protected $fillable = ['id','nombre'];

    //-----------------------------------------------------------------------
    //El color de vehiculo puede ser compartido por varios vehiculos
    //-----------------------------------------------------------------------
    public function vehiculos(){
    	return $this->hasMany('App\Vehiculo');
    }
}
