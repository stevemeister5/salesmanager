<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table='tbl_city';
    protected $primaryKey='city_id';	
	public $timestamps = false;
	
}
