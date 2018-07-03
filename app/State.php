<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table='tbl_state';
    protected $primaryKey='state_id';
	public $timestamps = false;
	
	public function lgas(){
        return $this->hasMany(LGA::class,'state_id');
    }
	
}
