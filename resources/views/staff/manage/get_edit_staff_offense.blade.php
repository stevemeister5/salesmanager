@foreach($offense_collection as $val)
 <div class="panel panel-white">
			<div class="panel-body">

				<form id="form_docs" role="form">
					@csrf
				<input name="offense_id" value="{{ $val->offense_id }}" type="hidden"/>

					<div class="form-group">
						<label for="offense_name">
							Offense Name
						</label>
						<input {{ $val->offense_id==1?"disabled":"" }} class="form-control" id="offense_name" value="{{ $val->offense_name }}" type="text" name="offense_name">
					</div>

					<div class="form-group">
						<label for="amount">
							Amount
						</label>
						<input {{ $val->offense_id==1?"disabled":"" }} class="form-control" id="amount" value="{{ $val->offense_id==1?"VARIABLE AMOUNT":"$val->amount" }}" type="text" name="amount">
					</div>


					<button id="submit" type="submit" class="btn btn-o btn-primary">
						Save Edits
					</button>


				</form>
			</div>
 </div>

	<script>
			
		jQuery(document).ready(function() {
										
			 $('form#form_docs').on('click','button#submit',function(e)
				{
					e.preventDefault();
					   
					    var docs_type_name=$.trim($('input[name="offense_name"]').val());
					     
					
						if(docs_type_name!="")
						{				
						
							 $.ajax(
								 {
									 type:"POST",
									 data:$('form#form_docs').serialize(),
									 url:"{{route('save_edit_staff_offense')}}",
									 beforeSend:function()
									  {
										  $('form#form_docs').block({ message: null }); 
									  },
									  success: function(r)
									  {							  
										 $('form#form_docs').unblock(); 
										 
																					 
											 swal("success!", "Operation was successful", "success");
											 $('.edit_area').modal('toggle');
										     location.reload();
										 
									  }
								 }
				 
						     );
							
						}
					    else{
						sweetAlert("Oops...", "All fields are compulsory!", "error");
						}
					
				});
		});
      </script>
@endforeach
							    