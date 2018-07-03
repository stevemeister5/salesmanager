@extends('../layouts.dash_layout')

@section('required_css')
	<link rel="stylesheet" href="{{asset('_vendor/select2/select2.min.css')}}">
@endsection


@section('content')

						@if( $role_collection->isEmpty()  )
						
							<div class="alert alert-block alert-danger fade in">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
							<h4 class="alert-heading margin-bottom-10"><i class="ti-close"></i> Error!</h4>
							<p class="margin-bottom-10">
								In order to create a Staff, Branches must have already been created.<br/> If you have the requisite privilege, kindly use the menu navigation on the left to create Branches or Roles, otherwise contact the Administrator.
							</p>

							</div>
						@endif

									
									
						<span class="clearfix"></span>
			
		   
		   <form id="form" enctype="multipart/form-data" method="post"  role="form">
			@csrf
			       <div>
          
          
					 <br/>
					<h2 class="label label-info" style="text-transform: uppercase; font-size: 17px !important">Personal Information</h2>
                     
                     <div id="container" class="form-group" style="margin-top: 20px">
                     <div id="staff-container"> </div>
					  <input id="staff_pic" type="file" name="staff_pic" />
					  <span class="help-block"><i class="ti-info-alt text-primary"></i> Select a Staff Image.Only JPEG, PNG &amp; GIF formats.  Image should not be larger than 1MB</span>
					 </div>

	                   <div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="first_name">
										First Name <span class="symbol required font"></span>
									</label>
									<input required value="{!! old('first_name') !!}" autocomplete="off" class="form-control underline" id="first_name" placeholder="Enter First Name" type="text" name="first_name">
									<span class="text-danger error-message"></span>
								</div>
							</div>
						   
						   
						   	<div class="col-md-4">
								<div class="form-group">
									<label for="middle_name">
										Middle Name <span class="symbol font"></span>
									</label>
									<input required value="{!! old('middle_name') !!}" autocomplete="off" class="form-control underline" id="middle_name" placeholder="Enter Middle Name" type="text" name="middle_name">
								</div>
							</div>
						   
							<div class="col-md-4">
								<div class="form-group">
									<label for="last_name">
										Last Name <span class="symbol required"></span>
									</label>
										<input required value="{!! old('last_name') !!}" autocomplete="off" class="form-control underline" id="last_name" placeholder="Enter Last Name" type="text" name="last_name">
									    <span class="text-danger error-message"></span>
								</div>
							</div>
						</div>
					   
					    <div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="residential_address">
										Residential Address <span class="symbol font"></span>
									</label>
									<input required value="{!! old('residential_address') !!}" autocomplete="off" class="form-control underline" id="residential_address" placeholder="Enter Residential Address" type="text" name="residential_address">
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
									<input required value="{!! old('phone') !!}" autocomplete="off" class="form-control underline" id="phone" placeholder="Enter Phone Number" type="text" name="phone">
									<span class="text-danger error-message"></span>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="email">
										Email <span class="symbol font"></span>
									</label>
										<input required value="{!! old('email') !!}" autocomplete="off" class="form-control underline" id="email" placeholder="Enter Email" type="text" name="email">
									    <span class="text-danger error-message"></span>
								</div>
							</div>
						</div>      
					   
					   
					    <div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="dob">
										Date of Birth <span class="symbol"></span>
									</label>
									<input autocomplete="off" placeholder="Enter in format YYYY-MM-DD e.g 1980-12-01" required value="{!! old('dob') !!}" class="form-control underline" id="dob"  type="text" name="dob">
									<span class="text-danger error-message"></span>
									
								</div>
							</div>
								 
							<div class="col-md-6">
								<div class="form-group">
									<label for="state_id">
										State of Origin <span class="symbol required"></span>
									</label>
									<select class="form-control underline" id="state_id"  name="state_id">
									<option selected value="">--Select State--</option>
									
								@if(!$state_collection->isEmpty())
									@foreach($state_collection as $val)
										<option value="{{ $val->state_id }}"> {{ $val->state_name }} </option>
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
										<option selected value="">--Select Gender--</option>
										<option value="0">Female</option>
										<option value="1">Male</option>
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
										<option selected value="">--Select Marital Status--</option>
										<option value="0">Single</option>
										<option value="1">Married</option>
										<option value="2">Divorced</option>
									</select>
									<span class="text-danger error-message"></span>
								</div>
							</div>
						</div>

						<div class="row">
							
							<div class="col-md-6">
								<div class="form-group">
									<label for="branch_id">
										Staff Role
									</label>
									<select class="form-control" id="role_id"  name="role_id">
									<option selected value="">--Select Staff Role--</option>

									@if(!$role_collection->isEmpty())
										@foreach($role_collection as $val)
										  <option value="{{ $val->role_id }}">{{ $val->role_name }}</option>
										@endforeach
									@endif


									</select>
										<span class="help-block"><i class="ti-info-alt text-primary"></i>Assign default privileges to Staff. Default privileges can still be modified before creating Staff</span>
								</div>
							
							</div>
							
							<div class="col-md-6">
								<div class="form-group">
									<label for="username">
										Username <span class="symbol required"></span>
									</label>
									
									<input value="{!! old('username') !!}" autocomplete="off" class="form-control underline" id="username" placeholder="Enter Username" type="text" name="username">
									<span class="help-block user_feedback label label-inverse"><i class="ti-info-alt text-primary"></i> No username specified</span>
								</div>
							</div>
							
						</div>

								
								<div id="here">
								
								</div>
			   
           	@if( !$role_collection->isEmpty() )
                <button class="btn btn-success btn-block btn-scroll btn-scroll-left ti-save-alt create" type="button"><span>CREATE STAFF </span></button>
			@endif
                
                
                <span class="clearfix"></span>

        </div>

</form>
						

@endsection

@section('required_js')
    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('_vendor/select2/select2.min.js')}}"></script>
	<script src="{{asset('_vendor/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
	<script src="{{asset('_vendor/bootstrap-checkbox/bootstrap-checkbox.js')}}"></script>
    <script>
			jQuery(document).ready(function() {
				Main.init();
			});
	</script>
@endsection

@section('additional_js')
    <script>

		//all resets
		$('form#form')[0].reset();
		$('input[name="staff_pic"]').val(""); 
		$('select').val("");

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

		//username
		$('form').on('keyup','input#username',function(e)
		{
			var val=$.trim($(this).val());
			var toks=$("input[name='_token']").val();

			if(val!="" && val.length>5)
			{
			$.ajax(
				 {
					 type:"POST",
					 data:{username:val,
				     _token:toks
						  },
					 url:"{{route('username_check')}}",
					 beforeSend:function()
					  {
						 $('span.user_feedback').html("...checking <img src='{{asset('_img/loading.gif')}}'/> ");
					  },
					  success: function(r)
					  {							  
						if(r=="exists")
						{
						$('span.user_feedback').removeClass("label-inverse").removeClass("label-success").addClass("label-danger");
						 $('span.user_feedback').html("...Already taken <i style='color:white' class='fa fa-times-circle'></i> ");
						}
						else if(r=="available")
						{
						$('span.user_feedback').removeClass("label-inverse").removeClass("label-danger").addClass("label-success").html("Username Available <i style='color:white' class='fa fa-check-circle'></i>");	
						}
					  }
				 }

			 );
			}else{
			$('span.user_feedback').removeClass("label-success").removeClass("label-danger").addClass("label-inverse").html("Please specify username");		
			}
		}
		);
				
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
		$('form#form').on('blur','input,select',(function(e)
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
		
		$('form#form').on('click','button.create',(function(e)
		{
			e.preventDefault();

			var formData = new FormData($('form#form')[0]);
			
			var isUsernameClear=!$('span.user_feedback').hasClass("label-success");
			var main_menu=$('input[data-main]:checked').length;
		   
		   if(main_menu==0)
			{
				 e.preventDefault();
				 sweetAlert("Oops...", "You must assign at least one privilege to Staff", "error");
			}
			else if(isUsernameClear)
			{
				sweetAlert("Oops...", "Kindly fix Username Error", "error");
			}
			else
			 {
				 $.ajax(
						 {
							 type:"POST",
							 data:formData,
							 url:"{{route('save_staff')}}",
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
								 $('form#form').unblock(); 

								  //clear any previous errors
								  $('span.error-message').html('');
								  $('div.has-error').removeClass('has-error');
								  $('div.has-success').removeClass('has-success');
								  //clear all items
								 $("#staff-container").empty();
								 $('form#form')[0].reset();
								 $('div#here').html("");
								 $('div.others_docs_here').html("");
								

								 
								 $('html, body').animate({scrollTop:$('body').offset().top-90},2000);
								  swal("success!", "New Staff Created.", "success");
								 }

							  }

                        ); 
			 }






		}));


	</script>
@endsection
