
							
	<span class="clearfix"></span>
@foreach($staff_collection as $staff)			
		   
		   <form id="edit_form" enctype="multipart/form-data" method="post"  role="form">
			@csrf
			   
			   <input type="hidden" name="staff_id" value="<?php echo base64_encode($staff->staff_id)  ?>">
			   
			       <div>
					 <br/>
					<h2 class="label label-info" style="text-transform: uppercase; font-size: 17px !important">Personal Information</h2>
                     
                     <div id="container" class="form-group" style="margin-top: 20px">
                     <div id="staff-container"> 
						 <img width="100px" height="100px" src="{{ asset("storage/staff_pics/".$staff->pics) }}" alt="">
					 </div>
					  <input id="staff_pic" type="file" name="staff_pic" />
					  <span class="help-block"><i class="ti-info-alt text-primary"></i> Select a Staff Image.Only JPEG, PNG &amp; GIF formats.  Image should not be larger than 300 KB</span>
					 </div>

	                   <div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="first_name">
										First Name <span class="symbol required font"></span>
									</label>
									<input required value="{!! $staff->first_name !!}" autocomplete="off" class="form-control underline" id="first_name" placeholder="Enter First Name" type="text" name="first_name">
									<span class="text-danger error-message"></span>
								</div>
							</div>
						   
						   
						   	<div class="col-md-4">
								<div class="form-group">
									<label for="middle_name">
										Middle Name <span class="symbol font"></span>
									</label>
									<input required value="{!! $staff->middle_name !!}" autocomplete="off" class="form-control underline" id="middle_name" placeholder="Enter Middle Name" type="text" name="middle_name">
								</div>
							</div>
						   
							<div class="col-md-4">
								<div class="form-group">
									<label for="last_name">
										Last Name <span class="symbol required"></span>
									</label>
										<input required value="{!! $staff->last_name !!}" autocomplete="off" class="form-control underline" id="last_name" placeholder="Enter Last Name" type="text" name="last_name">
									    <span class="text-danger error-message"></span>
								</div>
							</div>
						</div>
					   
					    <div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="residential_address">
										Residential Address <span class="symbol required font"></span>
									</label>
									<input required value="{!! $staff->residential_address !!}" autocomplete="off" class="form-control underline" id="residential_address" placeholder="Enter Residential Address" type="text" name="residential_address">
									<span class="text-danger error-message"></span>
								</div>
							</div>
	
						</div>

					   
					     <div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="phone">
										Phone <span class="symbol required"></span>
									</label>
									<input required value="{!! $staff->phone !!}" autocomplete="off" class="form-control underline" id="phone" placeholder="Enter Phone Number" type="text" name="phone">
									<span class="text-danger error-message"></span>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="email">
										Email <span class="symbol required font"></span>
									</label>
										<input required value="{!! $staff->email !!}" autocomplete="off" class="form-control underline" id="email" placeholder="Enter Email" type="text" name="email">
									    <span class="text-danger error-message"></span>
								</div>
							</div>
						</div>      
					   
					   
					    <div class="row">

								 
							<div class="col-md-4">
								<div class="form-group">
									<label for="state_id">
										State of Origin <span class="symbol required"></span>
									</label>
									<select class="form-control underline" id="state_id"  name="state_id">
									<option  value="">--Select State--</option>
									
								@if(!$state_collection->isEmpty())
									@foreach($state_collection as $val)
										<option 
												
												@if($staff->state_id==$val->state_id) 
													{{"selected"}}
											    @endif
												
												value="{{ $val->state_id }}"> {{ $val->state_name }} </option>
									@endforeach
								@endif
									</select>
									<span class="text-danger error-message"></span>
								</div>
							</div>
							

								 
						</div>
            
              
              	          <div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="gender">
										Gender <span class="symbol required"></span>
									</label>
									<select required class="form-control" name="gender" id="gender">
										<option value="">--Select Gender--</option>
										<option 
											 @if($staff->gender==0) 	
										      {{  "selected"	}}
										     @endif
												value="0">Female</option>
										<option
											 @if($staff->gender==1) 	
										      {{  "selected"	}}
										     @endif
												
												value="1">Male</option>
									</select>
									<span class="text-danger error-message"></span>
									
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="m_status">
										Marital Status <span class="symbol required"></span>
									</label>
									<select required class="form-control" name="m_status" id="m_status">
										<option  value="">--Select Marital Status--</option>
										<option
												
											 @if($staff->m_status==0) 	
										      {{  "selected"	}}
										     @endif
												
												value="0">Single</option>
										<option
											 @if($staff->m_status==1) 	
										      {{  "selected"	}}
										     @endif
												value="1">Married</option>
										<option
												
											 @if($staff->m_status==2) 	
										      {{  "selected"	}}
										     @endif
												
												value="2">Divorced</option>
									</select>
									<span class="text-danger error-message"></span>
								</div>
							</div>
						</div>



						<div class="row">

								<div class="col-md-6">
									<div class="form-group">
										<label for="role_id">
											Staff Role
										</label>
										<select class="form-control" id="role_id"  name="role_id">
										<option value="">--Select Staff Role--</option>

										@if(!$role_collection->isEmpty())
											@foreach($role_collection as $val)
											  <option

										@if($staff->role_id==$val->role_id) 
											{{"selected"}}
										@endif

													 value="{{ $val->role_id }}">{{ $val->role_name }}</option>
											@endforeach
										@endif


										</select>
											<span class="help-block"><i class="ti-info-alt text-primary"></i>Assign default privileges to Staff. Default privileges can still be modified before creating Staff</span>
									</div>

								</div>

						</div>
								
								
						
								
					   <div id="here">
									
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
								
								</div>

			   
           	@if(!$role_collection->isEmpty()  )
                <button class="btn btn-success btn-block btn-scroll btn-scroll-left ti-user create_staff" type="button" ><span style="height: 15px !important">SAVE STAFF EDITS</span></button>
					    <span class="clearfix"></span>
			@endif
                
                
               
                
			
          
            
        </div>
		
   
</form>
						
@endforeach
    <script>
			jQuery(document).ready(function() {
				Main.init();
			});
	</script>

    <script>
		

		
		//staff pic and other uploads manipulation
		$("#staff_pic").on('change', function() {
				
		var iden=$(this).attr('id');

		if(iden=="staff_pic")
		{
		var ext1=$.trim($('input[name="staff_pic"]').val().split('.').pop().toLowerCase());
			if(($.inArray(ext1, ['gif','png','jpg','jpeg']) == -1)  )
			{
				$('input[name="staff_pic"]').val(""); 
				$("#staff-container").empty();
				sweetAlert("Oops...", "Invalid File Formats. Only Image File Formats like jpg, png, gif Allowed!", "error");
			}
			else
			{	

			  if (typeof(FileReader) == "undefined") 
			  {
				alert("Your browser doesn't support HTML5, Please use an upgraded version of Chrome or Mozilla Firefox");
			  } 
			 else 
			 {

				var container = $("#staff-container");

				//remove all previous selected files
				container.empty();

				//create instance of FileReader
				var reader = new FileReader();
				reader.onload = function(e) {
				  $("<img />", {
					"src": e.target.result,
					  "width": 150,
					  "height":150,
					  "class":"img-rounded"
				  }).appendTo(container);
				}

				reader.readAsDataURL($(this)[0].files[0]);
			  }
			}
		}
	
				
		});

		//role things
		$('form').on('change','select#role_id',function(e)
		{

			   var id=$(this).val();
			   var toks=$("input[name='_token']").val();
			   if(id!=="")
			   {
				 $.ajax(
						 {
							 type:"POST",
							 data:{role_id:id,
								  _token:toks
								  },
							 url:"{{ route('get_staff_roles') }}",
							 beforeSend:function()
							  {
								  $('select#role').block({ message: null }); 
							  },
							  success: function(r)
							  {							  
								 $('select#role').unblock(); 

								 $('div#here').html(r);
							  }
						 }

					 );
			   }else{
				 $('div#here').html("Kindly select a role in order to edit associated privileges");  
			   }

			});
		
		//not("[name='username']")
		
		//Give user progress feedback
		$('form#edit_form').on('blur','input,select',(function(e)
			{
			  var $this=$(this);
			 if($.trim($this.val())!="")
				 {
					//validate 
					   $this.next('span.error-message').html('');
					   $this.closest('div.form-group').removeClass('has-error');
					   $this.closest('div.form-group').addClass('has-success');
				 }
			
	     	}));
		
		$('form#edit_form').on('click','button.create_staff',(function(e)
		{
			e.preventDefault();

			var formData = new FormData($('form#edit_form')[0]);
			var main_menu=$('input[data-main]:checked').length;
		   
		   if(main_menu==0)
			{
				 e.preventDefault();
				 sweetAlert("Oops...", "You must assign at least one privilege to Staff", "error");
			}
			else
			 {
				 $.ajax(
						 {
							 type:"POST",
							 data:formData,
							 url:"{{route('save_edits')}}",
							 cache:false,
							 contentType:false,
							 processData:false,
							 beforeSend:function()
							  {
								  $('form#edit_form').block({ message: null }); 
							  },
							  error: function(r)
							  {
								$('form#edit_form').unblock();

								 const errors = r.responseJSON.errors;
								 var first=true;		

								  //clear any previous errors
								  $('span.error-message').html('');
								  $('div.has-error').removeClass('has-error');


								  $.each(errors,function(index,value)
								  {		
									  var others_re= new RegExp("^others");
									  var staff_docs_re= new RegExp("^staff_docs");
									  var g_things= new RegExp("^g_");
									  
									  var others_re_result=others_re.test(index);
									  var staff_docs_re_result=staff_docs_re.test(index);
									  var g_things_result=g_things.test(index);
									 
									  
									  //for first item, kindly scroll into view
									  if(first && (!others_re_result && !staff_docs_re_result && !g_things_result) )
									  {											  
										 $('html, body').animate({scrollTop:$('#'+index).offset().top-90},2000);
										 $('#'+index).focus();
									  }
									  
									  if(others_re_result || staff_docs_re_result || g_things_result )
									  {
										  if(first && g_things_result)
										  {
										
											   $('html, body').animate({scrollTop:$('table.guarantor').offset().top-90},2000);
											  $('input[name^="g_"]').focus();
											     sweetAlert("Oops...", "Guarantor Phone or Email in invalid Format", "error");
										  }
										
										  
										  if(first && others_re_result)
										  {
										  $('input[name^="others"]').next('span.error-message').html(''+value);
									      $('input[name^="others"]').closest('div.form-group').addClass('has-error');
											  
											   $('html, body').animate({scrollTop:$('input[name^="others"]').offset().top-90},2000);
										        $('input[name^="others"]').focus();
											     sweetAlert("Oops...", value, "error");
										  }
										  
										  if(first && staff_docs_re_result)
										  {
											  $('input[name^="staff_docs"]').next('span.error-message').html(''+value);
									          $('input[name^="staff_docs"]').closest('div.form-group').addClass('has-error');
											  
											   $('html, body').animate({scrollTop:$('input[name^="staff_docs"]').offset().top-90},2000);
										        $('input[name^="staff_docs"]').focus();
											     sweetAlert("Oops...", value, "error");
										  }
										  
									  }
									  else
									  {
										  $('#'+index).next('span.error-message').html(''+value);
										  $('#'+index).closest('div.form-group').addClass('has-error'); 
										  
									  }

									  

									  first=false;
								  })



							  },
							  success: function(r)
							  {							  
								 $('form#edit_form').unblock(); 

								  //clear any previous errors
								  $('span.error-message').html('');
								  $('div.has-error').removeClass('has-error');
								  $('div.has-success').removeClass('has-success');
																 
								 $('html, body').animate({scrollTop:$('body').offset().top-90},2000);
								  swal("success!", "Edits Successfully Saved!", "success");
								 }

							  }

                        ); 
			 }






		}));

	

	</script>

