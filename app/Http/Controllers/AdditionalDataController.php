<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Staff_Role;
use App\Maintab;
use App\Subtab;
use App\Subertab;
use App\State;
use App\Staff;



class AdditionalDataController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


	
	###############################
	#MANAGE STAFF ADDITIONAL DATA #
	###############################
	
	public function get_view_staff_role(Request $request)
	{
		
	  $query=Staff_Role::where('role_id',$request->role_id)->get();
		
		$rights_str=$query[0]->rights;
		$rights=explode(',',$rights_str);
		
		$subrights_str=$query[0]->subrights;
		$subrights=explode(',',$subrights_str);
		
		$suberrights_str=$query[0]->suberrights;
		$suberrights=explode(',',$suberrights_str);
		
		//maintab: actual based on role id and full list
		$query = Maintab::whereIn('main_tab_id',$rights)->get();
		foreach($query as $val)
		{
		 	$role_main_tab_id[]=$val->main_tab_id;
			$role_main_tab_name[]=$val->main_tab_name;
		}
		
		$query=Maintab::all();
		foreach($query as $val)
		{
		 	$full_main_tab_id[]=$val->main_tab_id;
			$full_main_tab_name[]=$val->main_tab_name;
		}		
		
		$query=Subtab::whereIn('sub_tab_id',$subrights)->get();
		foreach($query as $val)
		{
			
			$role_sub_tab_id[]=$val->sub_tab_id;
			$role_main_sub_tab_id[]=$val->main_tab_id;
			$role_sub_tab_name[]=$val->sub_tab_name;
			$role_sub_tab_url[]=$val->sub_tab_url;
		}
		
		
		$query=Subtab::all();
		foreach($query as $val)
		{
	 		$full_sub_tab_id[]=$val->sub_tab_id;
			$full_main_sub_tab_id[]=$val->main_tab_id;
			$full_sub_tab_name[]=$val->sub_tab_name;
			$full_sub_tab_url[]=$val->sub_tab_url;
		}	
		
		
		//subertab: actual based on role id and full list
		$query=Subertab::whereIn('suber_tab_id',$suberrights)->get();
		foreach($query as $val)
		{
			$role_suber_tab_id[]=$val->suber_tab_id;
			$role_sub_suber_tab_id[]=$val->sub_tab_id;
			$role_suber_tab_name[]=$val->suber_tab_name;
		}
		
		
		$query=Subertab::all();
		foreach($query as $val)
		{
			$full_suber_tab_id[]=$val->suber_tab_id;
			$full_sub_suber_tab_id[]=$val->sub_tab_id;
			$full_suber_tab_name[]=$val->suber_tab_name;
		}
		
?>
<script>
	$('input[data-main]').checkboxpicker({
				  html: true,
				  offLabel: '<span class="glyphicon glyphicon-remove">',
				  onLabel: '<span class="glyphicon glyphicon-ok">'
				});
		
</script>

                                    <div class="tabbable tabs-left">
									
										<ul id="myTab4" class="nav nav-tabs">
										<?php
											for($a=0;$a<count($role_main_tab_id);$a++)
											{
										?>
											<li class="<?php echo $a==0?"active":"" ?>">
												<a href="#a<?php echo $role_main_tab_id[$a] ?>" data-toggle="tab" aria-expanded="<?php echo $a==0?"true":"false" ?>">
													<?php echo strtoupper($role_main_tab_name[$a]) ?>
												</a>
											</li>
											<?php
											}
										     ?>											
										</ul>
										<?php
										$checkbox_colours=array("primary", "success", "warning","danger","info","purple");
										?>
										
										<div class="tab-content">
										    <?php
											for($a=0;$a<count($role_main_tab_id);$a++)
											{
												
										     ?>
											<div class="tab-pane fade <?php echo $a==0?"active in":"" ?>" id="a<?php echo $role_main_tab_id[$a] ?>">
																								
													<div class="checkbox">
													<input disabled checked data-main="<?php echo $role_main_tab_id[$a] ?>" name="main[]" value="<?php echo $role_main_tab_id[$a] ?>" type="checkbox"/>
													</div>
													
													<?php
												    for($b=0;$b<count($role_sub_tab_id);$b++)
											        {
														$color=$checkbox_colours[rand(0,5)];
														if($role_main_sub_tab_id[$b]==$role_main_tab_id[$a])
														{
												    ?>
												    <div class="checkbox clip-check check-<?php echo $color ?>">
														<input checked data-sub="<?php echo $role_sub_tab_id[$b] ?>" disabled id="c<?php echo $role_sub_tab_id[$b] ?>" name="sub[]" value="<?php echo $role_sub_tab_id[$b] ?>"  type="checkbox">
														<label for="c<?php echo $role_sub_tab_id[$b] ?>">
														
															<?php 
															echo $role_sub_tab_url[$b]=="#"?strtoupper($role_sub_tab_name[$b]):"$role_sub_tab_name[$b]";
															?>
														</label>
													</div>
											          <?php
															if($role_sub_tab_url[$b]=="#")
															{
																for($c=0;$c<count($role_suber_tab_id);$c++)
																{
																	$color=$checkbox_colours[rand(0,5)];
															if($role_sub_tab_id[$b]==$role_sub_suber_tab_id[$c])
																	{
														?>
																<div style="margin-left: 35px" class="checkbox clip-check check-<?php echo $color ?>">
																<input checked data-suber="<?php echo $role_sub_suber_tab_id[$c] ?>" disabled id="d<?php echo $role_suber_tab_id[$c] ?>" name="suber[]" value="<?php echo $role_suber_tab_id[$c] ?>"  type="checkbox">
																<label for="d<?php echo $role_suber_tab_id[$c] ?>">

																	<?php 
																	echo $role_suber_tab_name[$c];
																	?>
																</label>
															    </div>
														<?php
																	}
																}
															}
															?>
											    
												    <?php
													}
													}
												    ?>
												
													
													
												
												
											</div>
											<?php
											 }
												?>
											
											
										</div>
									</div>	
<?php
	}
	
	public function get_edit_staff_role(Request $request)
	{
	  $query=Staff_Role::where('role_id',$request->role_id)->get();
		
		$role_name=$query[0]->role_name;
		
		$rights_str=$query[0]->rights;
		$rights=explode(',',$rights_str);
		
		$subrights_str=$query[0]->subrights;
		$subrights=explode(',',$subrights_str);
		
		$suberrights_str=$query[0]->suberrights;
		$suberrights=explode(',',$suberrights_str);
		
		//maintab: actual based on role id and full list
		$query = Maintab::whereIn('main_tab_id',$rights)->get();
		foreach($query as $val)
		{
		 	$role_main_tab_id[]=$val->main_tab_id;
			$role_main_tab_name[]=$val->main_tab_name;
		}
		
		$query=Maintab::all();
		foreach($query as $val)
		{
		 	$full_main_tab_id[]=$val->main_tab_id;
			$full_main_tab_name[]=$val->main_tab_name;
		}		
		
		$query=Subtab::whereIn('sub_tab_id',$subrights)->get();
		foreach($query as $val)
		{
			
			$role_sub_tab_id[]=$val->sub_tab_id;
			$role_main_sub_tab_id[]=$val->main_tab_id;
			$role_sub_tab_name[]=$val->sub_tab_name;
			$role_sub_tab_url[]=$val->sub_tab_url;
		}
		
		
		$query=Subtab::all();
		foreach($query as $val)
		{
	 		$full_sub_tab_id[]=$val->sub_tab_id;
			$full_main_sub_tab_id[]=$val->main_tab_id;
			$full_sub_tab_name[]=$val->sub_tab_name;
			$full_sub_tab_url[]=$val->sub_tab_url;
		}	
		
		
		//subertab: actual based on role id and full list
		$query=Subertab::whereIn('suber_tab_id',$suberrights)->get();
		foreach($query as $val)
		{
			$role_suber_tab_id[]=$val->suber_tab_id;
			$role_sub_suber_tab_id[]=$val->sub_tab_id;
			$role_suber_tab_name[]=$val->suber_tab_name;
		}
		
		
		$query=Subertab::all();
		foreach($query as $val)
		{
			$full_suber_tab_id[]=$val->suber_tab_id;
			$full_sub_suber_tab_id[]=$val->sub_tab_id;
			$full_suber_tab_name[]=$val->suber_tab_name;
		}
?>

<script type="text/javascript">
	
		jQuery(document).ready(function() {
	
	$('input[data-main]').checkboxpicker({
				  html: true,
				  offLabel: '<span class="glyphicon glyphicon-remove">',
				  onLabel: '<span class="glyphicon glyphicon-ok">'
				}).on('change', function(e) {
					
				 if($(this).is(":checked"))
				 {
					 var under="a"+$(this).data('main');
					 $("div#"+under+" input[type=checkbox]:disabled").removeAttr("disabled");
				 }
				else
				 {
					 var under="a"+$(this).data('main');
					 $("div#"+under+" input[type=checkbox]:enabled").not(this).prop("disabled", true); 
					 $("div#"+under+" input[type=checkbox]:disabled").removeAttr("checked");
				 }
				});
				
				
				$('input[data-sub]').on('click',function(e)
				{
					var whr=$(this).data('sub');
					
					if($(this).is(":checked")){
					$("input[data-suber="+whr+"]").prop("checked", true);
					}else{
					$("input[data-suber="+whr+"]").removeAttr("checked");	
					}
				});
				
				
				$('input[data-suber]').click(function(e)
				{
					var whr=$(this).data('suber');
					
					if($(this).is(":checked")){
					$("input[data-sub="+whr+"]").prop("checked", true);
					}
					else
					{
					
						if($("input[data-suber="+whr+"]:checked").length==0)
						{
						$("input[data-sub="+whr+"]").removeAttr("checked");	
						}
						
					}
				});
		});

</script>

									<div class="form-group" style="margin-top:20px">
										<label for="new_role"> <h4>Edit Role Name</h4></label>
									<input id="edit_role" value="<?php echo $role_name ?>" name="role_name" class="form-control underline"  type="text">
									</div>

                                    <div class="tabbable tabs-left">
									
										<ul id="myTab4" class="nav nav-tabs">
										<?php
											for($a=0;$a<count($full_main_tab_id);$a++)
											{
										?>
											<li class="<?php echo $a==0?"active":"" ?>">
												<a href="#a<?php echo $full_main_tab_id[$a] ?>" data-toggle="tab" aria-expanded="<?php echo $a==0?"true":"false" ?>">
													<?php echo strtoupper($full_main_tab_name[$a]) ?>
												</a>
											</li>
											<?php
											}
										     ?>											
										</ul>
										<?php
										$checkbox_colours=array("primary", "success", "warning","danger","info","purple");
										?>
										
										<div class="tab-content">
										    <?php
											for($a=0;$a<count($full_main_tab_id);$a++)
											{
												
										     ?>
											<div class="tab-pane fade <?php echo $a==0?"active in":"" ?>" id="a<?php echo $full_main_tab_id[$a] ?>">
																								
													<div class="checkbox">
													<input <?php echo in_array($full_main_tab_id[$a],$role_main_tab_id)?"checked":"" ?> data-main="<?php echo $full_main_tab_id[$a] ?>" name="main[]" value="<?php echo $full_main_tab_id[$a] ?>" type="checkbox"/>
													</div>
													
													<?php
												    for($b=0;$b<count($full_sub_tab_id);$b++)
											        {
														$color=$checkbox_colours[rand(0,5)];
														if($full_main_sub_tab_id[$b]==$full_main_tab_id[$a])
														{
												    ?>
												    <div class="checkbox clip-check check-<?php echo $color ?>">
														<input <?php echo in_array($full_sub_tab_id[$b],$role_sub_tab_id)?"checked":"" ?> data-sub="<?php echo $full_sub_tab_id[$b] ?>"  id="c<?php echo $full_sub_tab_id[$b] ?>" name="sub[]" value="<?php echo $full_sub_tab_id[$b] ?>"  type="checkbox">
														<label for="c<?php echo $full_sub_tab_id[$b] ?>">
														
															<?php 
															echo $full_sub_tab_url[$b]=="#"?strtoupper($full_sub_tab_name[$b]):"$full_sub_tab_name[$b]";
															?>
														</label>
													</div>
											          <?php
															if($full_sub_tab_url[$b]=="#")
															{
																for($c=0;$c<count($full_suber_tab_id);$c++)
																{
																	$color=$checkbox_colours[rand(0,5)];
															if($full_sub_tab_id[$b]==$full_sub_suber_tab_id[$c])
																	{
														?>
																<div style="margin-left: 35px" class="checkbox clip-check check-<?php echo $color ?>">
																<input <?php echo in_array($full_suber_tab_id[$c],$role_suber_tab_id)?"checked":"" ?> data-suber="<?php echo $full_sub_suber_tab_id[$c] ?>" id="d<?php echo $full_suber_tab_id[$c] ?>" name="suber[]" value="<?php echo $full_suber_tab_id[$c] ?>"  type="checkbox">
																<label for="d<?php echo $full_suber_tab_id[$c] ?>">

																	<?php 
																	echo $full_suber_tab_name[$c];
																	?>
																</label>
															    </div>
														<?php
																	}
																}
															}
															?>
											    
												    <?php
													}
													}
												    ?>
												
													
													
												
												
											</div>
											<?php
											 }
												?>
											
											
										</div>
									</div>
									<button id="submit" type="submit" class="btn btn-success btn-wide btn-scroll btn-scroll-left ti-save" data-placement="bottom" data-toggle="tooltip"  data-original-title="Edit Staff Role">
														<span>Save Edits</span>
													</button>

<?php
		
	}

	###########################
	#STAFF ADDITIONAL DATA    #
	###########################
	
	public function dynamic_staff_edit(Request $request)
	{
	$admin=Auth::user()->staff->admin;


	//General Queries
	## States
	$state_collection = State::all();

	## Staff Roles
	$role_collection = Staff_Role::all();

    //Staff Specific Information
	$staff_collection=DB::table('tbl_staff as s')
	 ->select('s.*')
	  ->where('s.staff_id',$request->id)->get();
		
		$query=User::where('staff_id',$request->id)->get();
		
		$rights_str=$query[0]->rights;
		if($rights_str!="")
		$rights=explode(',',$rights_str);
		
		$subrights_str=$query[0]->subrights;
        if($subrights_str!="")
		$subrights=explode(',',$subrights_str);
		
		$suberrights_str=$query[0]->suberrights;
        if($suberrights_str!="")
		$suberrights=explode(',',$suberrights_str);
		
		//maintab: actual based on role id and full list
        if(isset($rights)) {
            $query = Maintab::whereIn('main_tab_id', $rights)->get();
            foreach ($query as $val) {
                $role_main_tab_id[] = $val->main_tab_id;
                $role_main_tab_name[] = $val->main_tab_name;
            }
        }
		
		$query=Maintab::all();
		foreach($query as $val)
		{
		 	$full_main_tab_id[]=$val->main_tab_id;
			$full_main_tab_name[]=$val->main_tab_name;
		}		
		if(isset($subrights)) {
            $query = Subtab::whereIn('sub_tab_id', $subrights)->get();
            foreach ($query as $val) {

                $role_sub_tab_id[] = $val->sub_tab_id;
                $role_main_sub_tab_id[] = $val->main_tab_id;
                $role_sub_tab_name[] = $val->sub_tab_name;
                $role_sub_tab_url[] = $val->sub_tab_url;
            }
        }
		
		$query=Subtab::all();
		foreach($query as $val)
		{
	 		$full_sub_tab_id[]=$val->sub_tab_id;
			$full_main_sub_tab_id[]=$val->main_tab_id;
			$full_sub_tab_name[]=$val->sub_tab_name;
			$full_sub_tab_url[]=$val->sub_tab_url;
		}	
		
		
		//subertab: actual based on role id and full list
        if(isset($suberrights)) {
            $query = Subertab::whereIn('suber_tab_id', $suberrights)->get();
            foreach ($query as $val) {
                $role_suber_tab_id[] = $val->suber_tab_id;
                $role_sub_suber_tab_id[] = $val->sub_tab_id;
                $role_suber_tab_name[] = $val->suber_tab_name;
            }
        }
        else
        {
                $role_suber_tab_id=array();
                $role_sub_suber_tab_id=array();
                $role_suber_tab_name=array();

        }

		$query=Subertab::all();
        if(!$query->isEmpty()) {
            foreach ($query as $val) {
                $full_suber_tab_id[] = $val->suber_tab_id;
                $full_sub_suber_tab_id[] = $val->sub_tab_id;
                $full_suber_tab_name[] = $val->suber_tab_name;
            }
        }else{
            $full_suber_tab_id[] = array();
            $full_sub_suber_tab_id[] =array();
            $full_suber_tab_name[] = array();
        }
		
	
	$data=
	[
		'state_collection' =>$state_collection,
		'role_collection' =>$role_collection,
		'staff_collection' =>$staff_collection,
		'full_main_tab_id'=>$full_main_tab_id,
		'full_main_tab_name'=>$full_main_tab_name,
		'role_main_tab_id'=>$role_main_tab_id,
		'role_main_tab_name'=>$role_main_tab_name,
		'full_sub_tab_id'=>$full_sub_tab_id,
		'full_main_sub_tab_id'=>$full_main_sub_tab_id,
		'full_sub_tab_name'=>$full_sub_tab_name,
		'full_sub_tab_url'=>$full_sub_tab_url,		
		'role_sub_tab_id'=>$role_sub_tab_id,
		'role_main_sub_tab_id'=>$role_main_sub_tab_id,
		'role_sub_tab_name'=>$role_sub_tab_name,
		'role_sub_tab_url'=>$role_sub_tab_url,
		
		'full_suber_tab_id'=>$full_suber_tab_id,
		'full_sub_suber_tab_id'=>$full_sub_suber_tab_id,
		'full_suber_tab_name'=>$full_suber_tab_name,
		'role_suber_tab_id'=>$role_suber_tab_id,
		'role_sub_suber_tab_id'=>$role_sub_suber_tab_id,
		'role_suber_tab_name'=>$role_suber_tab_name,
	];
		
		return view('staff.individual_edit')->with($data);
	 }
	
	public function get_staff_roles(Request $request)
	{
		$query=Staff_Role::where('role_id',$request->role_id)->get();
		
		$rights_str=$query[0]->rights;
		$rights=explode(',',$rights_str);
		
		$subrights_str=$query[0]->subrights;
		$subrights=explode(',',$subrights_str);
		
		$suberrights_str=$query[0]->suberrights;
		$suberrights=explode(',',$suberrights_str);
		
		//maintab: actual based on role id and full list
		$query = Maintab::whereIn('main_tab_id',$rights)->get();
		foreach($query as $val)
		{
		 	$role_main_tab_id[]=$val->main_tab_id;
			$role_main_tab_name[]=$val->main_tab_name;
		}
		
		$query=Maintab::all();
		foreach($query as $val)
		{
		 	$full_main_tab_id[]=$val->main_tab_id;
			$full_main_tab_name[]=$val->main_tab_name;
		}		
		
		$query=Subtab::whereIn('sub_tab_id',$subrights)->get();
		foreach($query as $val)
		{
			
			$role_sub_tab_id[]=$val->sub_tab_id;
			$role_main_sub_tab_id[]=$val->main_tab_id;
			$role_sub_tab_name[]=$val->sub_tab_name;
			$role_sub_tab_url[]=$val->sub_tab_url;
		}
		
		
		$query=Subtab::all();
		foreach($query as $val)
		{
	 		$full_sub_tab_id[]=$val->sub_tab_id;
			$full_main_sub_tab_id[]=$val->main_tab_id;
			$full_sub_tab_name[]=$val->sub_tab_name;
			$full_sub_tab_url[]=$val->sub_tab_url;
		}	
		
		
		//subertab: actual based on role id and full list
		$query=Subertab::whereIn('suber_tab_id',$suberrights)->get();
		foreach($query as $val)
		{
			$role_suber_tab_id[]=$val->suber_tab_id;
			$role_sub_suber_tab_id[]=$val->sub_tab_id;
			$role_suber_tab_name[]=$val->suber_tab_name;
		}
		
		
		$query=Subertab::all();
		foreach($query as $val)
		{
			$full_suber_tab_id[]=$val->suber_tab_id;
			$full_sub_suber_tab_id[]=$val->sub_tab_id;
			$full_suber_tab_name[]=$val->suber_tab_name;
		}
?>

<script type="text/javascript">
	
		jQuery(document).ready(function() {
	
			$('input[data-main]').checkboxpicker({
				  html: true,
				  offLabel: '<span class="glyphicon glyphicon-remove">',
				  onLabel: '<span class="glyphicon glyphicon-ok">'
				}).on('change', function(e) {
					
				 if($(this).is(":checked"))
				 {
					 var under="a"+$(this).data('main');
					 $("div#"+under+" input[type=checkbox]:disabled").removeAttr("disabled");
				 }
				else
				 {
					 var under="a"+$(this).data('main');
					 $("div#"+under+" input[type=checkbox]:enabled").not(this).prop("disabled", true); 
					 $("div#"+under+" input[type=checkbox]:disabled").removeAttr("checked");
				 }
				});
				
				
				$('input[data-sub]').on('click',function(e)
				{
					var whr=$(this).data('sub');
					
					if($(this).is(":checked")){
					$("input[data-suber="+whr+"]").prop("checked", true);
					}else{
					$("input[data-suber="+whr+"]").removeAttr("checked");	
					}
				});
				
				
				$('input[data-suber]').click(function(e)
				{
					var whr=$(this).data('suber');
					
					if($(this).is(":checked")){
					$("input[data-sub="+whr+"]").prop("checked", true);
					}
					else
					{
					
						if($("input[data-suber="+whr+"]:checked").length==0)
						{
						$("input[data-sub="+whr+"]").removeAttr("checked");	
						}
						
					}
				});
		});

</script>

 <div class="tabbable tabs-left">

<ul id="myTab4" class="nav nav-tabs">
<?php
	for($a=0;$a<count($full_main_tab_id);$a++)
	{
?>
	<li class="<?php echo $a==0?"active":"" ?>">
		<a href="#a<?php echo $full_main_tab_id[$a] ?>" data-toggle="tab" aria-expanded="<?php echo $a==0?"true":"false" ?>">
			<?php echo strtoupper($full_main_tab_name[$a]) ?>
		</a>
	</li>
	<?php
	}
	 ?>											
</ul>
<?php
$checkbox_colours=array("primary", "success", "warning","danger","info","purple");
?>

<div class="tab-content">
	<?php
	for($a=0;$a<count($full_main_tab_id);$a++)
	{

	 ?>
	<div class="tab-pane fade <?php echo $a==0?"active in":"" ?>" id="a<?php echo $full_main_tab_id[$a] ?>">

			<div class="checkbox">
			<input <?php echo in_array($full_main_tab_id[$a],$role_main_tab_id)?"checked":"" ?> data-main="<?php echo $full_main_tab_id[$a] ?>" name="main[]" value="<?php echo $full_main_tab_id[$a] ?>" type="checkbox"/>
			</div>

			<?php
			for($b=0;$b<count($full_sub_tab_id);$b++)
			{
				$color=$checkbox_colours[rand(0,5)];
				if($full_main_sub_tab_id[$b]==$full_main_tab_id[$a])
				{
			?>
			<div class="checkbox clip-check check-<?php echo $color ?>">
				<input <?php echo in_array($full_sub_tab_id[$b],$role_sub_tab_id)?"checked":"" ?> data-sub="<?php echo $full_sub_tab_id[$b] ?>"  id="c<?php echo $full_sub_tab_id[$b] ?>" name="sub[]" value="<?php echo $full_sub_tab_id[$b] ?>"  type="checkbox">
				<label for="c<?php echo $full_sub_tab_id[$b] ?>">

					<?php 
					echo $full_sub_tab_url[$b]=="#"?strtoupper($full_sub_tab_name[$b]):"$full_sub_tab_name[$b]";
					?>
				</label>
			</div>
			  <?php
					if($full_sub_tab_url[$b]=="#")
					{
						for($c=0;$c<count($full_suber_tab_id);$c++)
						{
							$color=$checkbox_colours[rand(0,5)];
					if($full_sub_tab_id[$b]==$full_sub_suber_tab_id[$c])
							{
				?>
						<div style="margin-left: 35px" class="checkbox clip-check check-<?php echo $color ?>">
						<input <?php echo in_array($full_suber_tab_id[$c],$role_suber_tab_id)?"checked":"" ?> data-suber="<?php echo $full_sub_suber_tab_id[$c] ?>" id="d<?php echo $full_suber_tab_id[$c] ?>" name="suber[]" value="<?php echo $full_suber_tab_id[$c] ?>"  type="checkbox">
						<label for="d<?php echo $full_suber_tab_id[$c] ?>">

							<?php 
							echo $full_suber_tab_name[$c];
							?>
						</label>
						</div>
				<?php
							}
						}
					}
					?>

			<?php
			}
			}
			?>





	</div>
	<?php
	 }
		?>


</div>
</div>

<?php
		
		
	}
	
    public function username_check(Request $request)
	{
		
		if(User::where('username',$request->username)->exists())
			echo "exists";
		 else
			 echo "available";
		     
    }


}
