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
									<label for="offense_name">
										Offense <span class="symbol required font"></span>
									</label>
									<input required value="" autocomplete="off" class="form-control underline" id="offense_name" placeholder="Enter Offense Name" type="text" name="offense_name">
									<span class="text-danger error-message"></span>
								</div>
							</div>
						</div>

					   <div class="row">
						   <div class="col-md-6">
							   <div class="form-group">
								   <label for="amount">
									   Amount <span class="symbol required font"></span>
								   </label>
								   <input required value="" autocomplete="off" class="form-control underline" id="amount" placeholder="Enter Amount" type="text" name="amount">
								   <span class="text-danger error-message"></span>
							   </div>
						   </div>
					   </div>
					   
					    <div class="row">
							<div class="col-md-6">
								<button class="btn btn-success btn-block btn-scroll btn-scroll-left ti-save-alt create" type="button"><span>CREATE STAFF OFFENSE</span></button>
							</div>
					   </div>

                		
		
                <span class="clearfix"></span>

               </div>
		
   
</form>
						

@endsection

@section('required_js')
    <script src="{{asset('js/main.js')}}"></script>
    <script>
			jQuery(document).ready(function() {
				Main.init();
			});
	</script>
@endsection

@section('additional_js')
    <script>
		$('form#form').on('click','button.create',(function(e)
		{
			e.preventDefault();

			var formData = new FormData($('form#form')[0]);
		
				 $.ajax(
						 {
							 type:"POST",
							 data:formData,
							 url:"{{route('save_staff_offense')}}",
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
			

		}));

	
	</script>
@endsection
