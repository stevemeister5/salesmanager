<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table='tbl_staff';
    protected $primaryKey='staff_id';
	public $timestamps = false;

    protected $guarded = [
        'staff_id'
    ];
	
	protected $dates = [
        'resumption_date',
        'termination_date'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function role(){
        return $this->belongsTo(Staff_Role::class,'role_id');
    }
    
    public function branch(){
        return $this->belongsTo(Branch::class,'branch_id');
    }
    
    public function level(){
        return $this->belongsTo(Staff_Level::class,'level_id');
    }
    
    public function unit(){
        return $this->belongsTo(Staff_Unit::class,'unit_id');
    }

    public function dept(){
        return $this->belongsTo(Staff_Dept::class,'dept_id');
    }

    public function state(){
        return $this->belongsTo(State::class,'state_id');
    }
	
	 public function lga(){
        return $this->belongsTo(LGA::class,'lga_id');
    }

   /*  
        *Work on this later. It's currently just status on Staff table
   public function status(){
        return $this->belongsTo(Staff_Status::class,'status_id');
    } */

    


}
