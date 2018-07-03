@extends('../layouts.dash_layout')

@section('required_css')
	<link rel="stylesheet" href="{{asset('_vendor/select2/select2.min.css')}}">
@endsection


@section('content')

									
        <span class="clearfix"></span>
			
		   
		   <form id="form" enctype="multipart/form-data" method="post"  role="form">
			@csrf
			       <div>

	                   <div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="role_name">
										New Staff Role <span class="symbol required font"></span>
									</label>
									<input required value="" autocomplete="off" class="form-control underline" id="role_name" placeholder="Enter Staff Role" type="text" name="role_name">
									<span class="text-danger error-message"></span>
								</div>
							</div>
						   
						   
						</div>
					   
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
											<input data-main="<?php echo $role_main_tab_id[$a] ?>" name="main[]" value="<?php echo $role_main_tab_id[$a] ?>" type="checkbox"/>
											</div>

											<?php
											for($b=0;$b<count($role_sub_tab_id);$b++)
											{
												$color=$checkbox_colours[rand(0,5)];
												if($role_main_sub_tab_id[$b]==$role_main_tab_id[$a])
												{
											?>
											<div class="checkbox clip-check check-<?php echo $color ?>">
												<input data-sub="<?php echo $role_sub_tab_id[$b] ?>" disabled id="c<?php echo $role_sub_tab_id[$b] ?>" name="sub[]" value="<?php echo $role_sub_tab_id[$b] ?>"  type="checkbox">
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
														<input data-suber="<?php echo $role_sub_suber_tab_id[$c] ?>" disabled id="d<?php echo $role_suber_tab_id[$c] ?>" name="suber[]" value="<?php echo $role_suber_tab_id[$c] ?>"  type="checkbox">
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

				<div class="row">
					<div class="col-md-6">
						<button class="btn btn-success btn-block btn-scroll btn-scroll-left ti-book create" type="button"><span>CREATE NEW ROLE</span></button>
					</div>
			   </div>

                		
		
                <span class="clearfix"></span>

               </div>
		
   
</form>
						

@endsection

@section('required_js')
    <script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('_vendor/bootstrap-checkbox/bootstrap-checkbox.js')}}"></script>
    <script>
			jQuery(document).ready(function() {
				Main.init();
			});
	</script>
@endsection

@section('additional_js')
    <script>
		
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
					 $("div#"+under+" input[type=checkbox]:enabled").prop("disabled", true); 
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
					}else{
					
						if($("input[data-suber="+whr+"]:checked").length==0)
						{
						$("input[data-sub="+whr+"]").removeAttr("checked");	
						}
						
					}
				});
					
		
		$('form#form').on('click','button.create',(function(e)
		{
			e.preventDefault();

			var formData = new FormData($('form#form')[0]);
			var name=$.trim($('input[name=role_name]').val());
					    var main_menu=$('input[data-main]:checked').length;
					   					
				if(name!="" && main_menu!=0)
				{	
		
				 $.ajax(
						 {
							 type:"POST",
							 data:formData,
							 url:"{{route('save_staff_role')}}",
							 cache:false,
							 contentType:false,
							 processData:false,
							 beforeSend:function()
							  {
								  $('form#form').block({ message: null }); 
							  },
							  error: function(r)
							  {
								$('form#form').unblock();

								 const errors = r.responseJSON.errors;
								 var first=true;		

								  //clear any previous errors
								  $('span.error-message').html('');
								  $('div.has-error').removeClass('has-error');


								  $.each(errors,function(index,value)
								  {	
								   $('#'+index).next('span.error-message').html(''+value);
								   $('#'+index).closest('div.form-group').addClass('has-error'); 
								   $('html, body').animate({scrollTop:$('#'+index).offset().top-90},2000);

								  })



							  },
							  success: function(r)
							  {							  
								 $('form#form').unblock(); 

								  //clear any previous errors
								  $('span.error-message').html('');
								  $('div.has-error').removeClass('has-error');
								  $('div.has-success').removeClass('has-success');
								  //clear all items
								
								 $('form#form')[0].reset();
	
								 $('html, body').animate({scrollTop:$('body').offset().top-90},2000);
								  swal("success!", "Successfully Created!", "success");
								 }

							  }

                        ); 
					
					}
					    else{
						sweetAlert("Oops...", "All fields are compulsory!", "error");
						}
			

		}));

	
	</script>
@endsection
