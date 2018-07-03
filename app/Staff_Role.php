<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff_Role extends Model
{
    protected $table='tbl_roles';
    protected $primaryKey='role_id';
	public $timestamps = false;

public function staff(){ return $this->hasOne(Staff::class,'staff_id');}
	
   
}
