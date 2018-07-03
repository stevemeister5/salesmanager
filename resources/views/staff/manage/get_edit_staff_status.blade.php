@foreach($staff_status_collection as $val)  
 <div class="panel panel-white">
			<div class="panel-body">

				<form id="form_docs" role="form">
					@csrf
				<input name="status_id" value="{{ $val->status_id }}" type="hidden"/>

					<div class="form-group">
						<label for="exampleInputEmail1">
							Staff Status
						</label>
						<input class="form-control" id="exampleInputEmail1" value="{{ $val->status_name }}" type="text" name="status_name">
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
					   
					    var docs_type_name=$.trim($('input[name="status_name"]').val());
					     
					
						if(docs_type_name!="")
						{				
						
							 $.ajax(
								 {
									 type:"POST",
									 data:$('form#form_docs').serialize(),
									 url:"{{route('save_edit_staff_status')}}",
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
							    