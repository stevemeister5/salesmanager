<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $table='tbl_settings';
    protected $primaryKey='settings_id';
	public $timestamps = false;
}
