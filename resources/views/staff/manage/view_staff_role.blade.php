@extends('../layouts.dash_layout')

@section('required_css')
	<link rel="stylesheet" href="{{asset('_vendor/select2/select2.min.css')}}">
@endsection

@section('content')
		 

		  @if( $staff_role_collection->isEmpty())
				<div class="alert alert-block alert-danger fade in">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
					<h4 class="alert-heading margin-bottom-10"><i class="ti-close"></i> Error!</h4>
					<p class="margin-bottom-10">
						No Staff Roles Created
					</p>

				</div>
		  @else
			<!--  Begin Initial -->
			<div id="initial" class="init">
				
				<form action="" id="form">
					@csrf
				 <h5 class="over-title" style="margin-top:29px !important"><span class="text-bold badge badge-success "> <?php echo $staff_role_collection->count() ?></span> staff role(s) created! </h5>
					
						<div class="form-group">
									<label for="role">
										Staff Role
									</label>
									<select autocomplete="off" class="form-control" id="role"  name="role_id">
									<option selected="selected" value="">--Select Role--</option>
									@foreach($staff_role_collection as $val)
										<option value="{{ $val->role_id }}">{{ $val->role_name}}</option>
									@endforeach
									</select>
								</div>
									
									<div id="here">
										
									</div>
					
					
					
				

				   </form>	
						

			</div>		           
			<!--  End of Initial -->	

				

	        
          @endif


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
	
				
		$('form').on('change','select#role',function(e)
		{

			   var id=$(this).val();
			   var toks=$('input[name="_token"]').val();
			   if(id!="")
			   {
				 $.ajax(
						 {
							 type:"POST",
							 data:{role_id:id,_token:toks},
														 
							@if(Route::current()->getName() == 'edit_staff_role')
							 
							 url:"{{route('get_edit_staff_role')}}",
							 
							@else
							 
							  url:"{{route('get_view_staff_role')}}",

							@endif
							 
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
				 $('div#here').html("Kindly Select a role in order to view associated privileges");  
			   }

				});
		
		
		@if(Route::current()->getName() == 'edit_staff_role')
		
		$('form#form').on('click','button#submit',function(e)
				{
					e.preventDefault();
					    var name=$.trim($('input[name="role_name"]').val());
					    var main_menu=$('input[data-main]:checked').length;
					   					
						if(name!="" && main_menu!=0)
						{				
						
							 $.ajax(
								 {
									 type:"POST",
									 data:$('form#form').serialize(),
									 url:"{{route('save_edit_staff_role')}}",
									 beforeSend:function()
									  {
										  $('form#form').block({ message: null }); 
									  },
									  success: function(r)
									  {							  
										 $('form#form').unblock(); 
							
											 swal("success!", "Operation was successful", "success");
										     location.reload();
										 
									  }
								 }
				 
						     );
							
						}
					    else{
						sweetAlert("Oops...", "All fields are compulsory!", "error");
						}
					
				});
					
        @endif

			
		
	</script>
@endsection
