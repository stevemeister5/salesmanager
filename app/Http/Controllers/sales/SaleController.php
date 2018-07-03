<?php

namespace App\Http\Controllers\sales;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash; 

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Settings;
use App\Staff;
use App\User;
use App\Sales;


class SaleController extends Controller
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

    ###########################
    #CREATE, VIEW & EDIT SALE##
    ###########################
    public function make()
    {
	$id=Auth::user()->staff->staff_id;
	$admin=Auth::user()->staff->admin;

         $sales_collection = DB::table('tbl_sales as sales')
             ->leftjoin('tbl_staff as s', 's.staff_id', '=', 'sales.staff_id')
             ->select('sales.*', 'first_name', 'middle_name', 'last_name')
             ->whereDate('sales.date', date('Y-m-d'))
             ->get();

    $data=[
        'sales_collection'=>$sales_collection
    ];

    return view('sales.create')->with($data);
    }

    public function save(Request $request)
    {	
        $rules =
	   [
	   'item_name'=>'required',
	   'item_price'=>'required|numeric',
	   'item_qty'=>'required|numeric',
	   'amount'=>'required|numeric',
       ];

	  /*$customs_messages =
		   [
		  'state_id.required'=>'State Field is required',
		   'phone.regex'=>'Phone must be numeric, start with 0 and be exactly 11 digits',
		   'dob.date'=>'Date of Birth must be in the exact format YYYY-MM-DD e.g 2009-05-01',
		   'dob.date_format'=>'Date of Birth must be in the exact format YYYY-MM-DD e.g 2009-05-01',
		   'm_status.required'=>'Marital Status field is required',
		   'role_id.required'=>'Staff Role is required',
		  ];*/

	   //check validation options
	   $this->validate($request,$rules /*$customs_messages*/);

	   //Saving to tbl_sales in order of arrangement in form
	   $sales = new Sales;
	   $sales->item_name = $request->item_name;
	   $sales->item_price = $request->item_price;
	   $sales->item_qty = $request->item_qty;
	   $sales->amount = $request->amount;
	   $sales->description = $request->description;
	   $sales->staff_id = Auth::user()->staff->staff_id;
	   $sales->date = date('Y-m-d H:i:s');
	   $sales->save();

	   // Mail::to($staff->email)->send(new WelcomeStaff($data));

   }
	
	public function save_edits(Request $request)
    {	
		   $rules = 
		   [
		  'staff_pic'=>'sometimes|mimes:png,gif,jpg,JPG,jpeg|max:1024',//size:300 will enforce that the size MUST be exactly 300
		   'first_name'=>'required',
		   'last_name'=>'required',
		   'phone'=>'required|regex:/^(0)[0-9]{10}$/',
		   'email'=>'email',
		   'dob'=>'date|date_format:Y-m-d',
		   'state_id'=>'required|numeric',
		   'gender'=>'required|numeric',
		   'm_status'=>'required|numeric',
		   'role_id'=>'required|numeric',
	   ];
	   
	  $customs_messages = 
		   [
		  'state_id.required'=>'State Field is required',
		   'phone.regex'=>'Phone must be numeric, start with 0 and be exactly 11 digits',
		   'dob.date'=>'Date of Birth must be in the exact format YYYY-MM-DD e.g 2009-05-01',
		   'dob.date_format'=>'Date of Birth must be in the exact format YYYY-MM-DD e.g 2009-05-01',
		   'm_status.required'=>'Marital Status field is required',
		   'role_id.required'=>'Staff Role is required'
		  ];

	   //check validation options
	   $this->validate($request,$rules, $customs_messages);

	   
	   //handle Staff Image
	   if($request->hasFile('staff_pic'))
	   {
		 $fileNameWithExt=$request->file('staff_pic')->getClientOriginalName();
		 //Get Extension
		 $fileExt=$request->file('staff_pic')->getClientOriginalExtension();
		 //new dynamic name
		 $fileNameToStore=strtolower($request->first_name."_".$request->last_name."_".rand(1,9999999).".".$fileExt);
		 //upload image
		 $path=$request->file('staff_pic')->storeAs('public/staff_pics',$fileNameToStore);
	   }
	  
		$update_id=base64_decode($request->staff_id);

	   //updating tbl_staff in order of arrangement in form	
		
	   $staff = Staff::find($update_id);
	   if(isset($fileNameToStore))
	   {
	   $staff->pics = $fileNameToStore;
	   }
	   $staff->first_name = $request->first_name;
	   $staff->middle_name = $request->middle_name;
	   $staff->last_name = $request->last_name;
	   $staff->residential_address = $request->residential_address;
	   $staff->phone = $request->phone;
	   $staff->email = $request->email;
	   $staff->dob = $request->dob;
	   $staff->state_id = $request->state_id;
	   $staff->gender = $request->gender;
	   $staff->m_status = $request->m_status;
	   $staff->role_id = $request->role_id;


	   $staff->save();

	   
	   //Update rights
	    $rights = implode(',',$request->main);
	    $sub = implode(',',$request->sub);
	    if(isset($request->suber))
	    $suber = implode(',',$request->suber);
	    else
        $suber="";
	   
	    User::where('staff_id',$update_id)->update(['rights' => $rights, 'subrights' => $sub, 'suberrights' => $suber ]);
	   

   }

	public function vista()
	{
		$id=Auth::user()->staff->staff_id;

            $staff_collection=DB::table('tbl_staff as s')
             ->leftjoin('tbl_roles as z','z.role_id','=','s.role_id')
             ->leftjoin('tbl_state as state','state.state_id','=','s.state_id')
            ->select('s.*','role_name','state_name')->where('s.staff_id','<>',0)->get();

        
		$data = 
		[
		'staff_collection'	=> $staff_collection
		];
			
		return view('staff.vista')->with($data);
	}

}
