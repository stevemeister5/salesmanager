<?php

namespace App\Http\Controllers;
use Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 

use App\User;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

	
    public function landing()
	{	
		$id=Auth::user()->staff->staff_id;
		$psw_query= User::select('password')->where('staff_id',$id)->get();
		$psw=$psw_query[0]->password;
	    if(Hash::check('password',$psw))		
         return view('dashboard')->with('psw','yep!');
		else
		 return view('dashboard');
    }
	
	
	public function first_changepsw(Request $request)
	{
	    $rules = 
		   [
		   'password1'=>'required|min:6',
		   'password2'=>'required|min:6|same:password1'
		   ]; 
		
		$this->validate($request,$rules);
		
		$id=Auth::user()->staff->staff_id;
		User::find($id)->update(['password'=>Hash::make($request->password1)]);
	 
	   
	}
    
}
