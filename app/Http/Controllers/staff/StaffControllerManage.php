<?php

namespace App\Http\Controllers\staff;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash; 

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Settings;
use App\Staff;
use App\State;
use App\Staff_Role;
use App\User;
use App\Maintab;
use App\Subtab;
use App\Subertab;


class StaffControllerManage extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
	{
        $this->middleware('auth');
    }

	#Staff Role
    public function new_staff_role()
    {
		$query=Maintab::all();
		foreach($query as $val)
		{
		 	$role_main_tab_id[]=$val->main_tab_id;
			$role_main_tab_name[]=$val->main_tab_name;
		}		
		
		$query=Subtab::all();
		foreach($query as $val)
		{
			
			$role_sub_tab_id[]=$val->sub_tab_id;
			$role_main_sub_tab_id[]=$val->main_tab_id;
			$role_sub_tab_name[]=$val->sub_tab_name;
			$role_sub_tab_url[]=$val->sub_tab_url;
		}
		
		$query=Subertab::all();
		foreach($query as $val)
		{
			$role_suber_tab_id[]=$val->suber_tab_id;
			$role_sub_suber_tab_id[]=$val->sub_tab_id;
			$role_suber_tab_name[]=$val->suber_tab_name;
		}
		
		$data=[
			'role_main_tab_id'=>$role_main_tab_id,
			'role_main_tab_name'=>$role_main_tab_name,
			'role_sub_tab_id'=>$role_sub_tab_id,
			'role_main_sub_tab_id'=>$role_main_sub_tab_id,
			'role_sub_tab_name'=>$role_sub_tab_name,
			'role_sub_tab_url'=>$role_sub_tab_url,
			'role_suber_tab_id'=>$role_suber_tab_id,
			'role_sub_suber_tab_id'=>$role_sub_suber_tab_id,
			'role_suber_tab_name'=>$role_suber_tab_name
			
		];
		return view('staff.manage.create_staff_role')->with($data);
	}

	public function view_staff_role()
    {
		$query = Staff_Role::all();
		return view('staff.manage.view_staff_role')->with('staff_role_collection',$query);
	}
	
	public function save_staff_role(Request $request)
    { 
	    $rules 				= 	['role_name'=>'required' ];
		//$customs_messages 	=	['docs_type.required'=>'Document Type is required'];
		$this->validate($request,$rules);
		
		$staff_role = new Staff_Role;
		$staff_role->role_name=$request->role_name;
		$staff_role->rights=implode(",",$request->main);
		
		if(isset($request->sub[0]))
		{
		$staff_role->subrights=implode(",",$request->sub);	
		}
		
		if(isset($request->suber[0]))
		{
		$staff_role->suberrights=implode(",",$request->suber);	
		}
		
		$staff_role->save();
		
	}
	
	public function save_edit_staff_role(Request $request)
	{
	 $staff_role=Staff_Role::find($request->role_id);
	 $staff_role->role_name=$request->role_name;
	
	 $staff_role->rights=implode(",",$request->main);
		
		if(isset($request->sub[0]))
		$staff_role->subrights=implode(",",$request->sub);	
		
		
		if(isset($request->suber[0]))
		$staff_role->suberrights=implode(",",$request->suber);	
		
		
	 $staff_role->save();
		
	}
	

}
