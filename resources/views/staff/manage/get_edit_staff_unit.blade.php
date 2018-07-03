@foreach($staff_unit_collection as $val)  
 <div class="panel panel-white">
			<div class="panel-body">

				<form id="form_docs" role="form">
					@csrf
				<input name="unit_id" value="{{ $val->unit_id }}" type="hidden"/>

					<div class="form-group">
						<label for="exampleInputEmail1">
							Staff Unit
						</label>
						<input class="form-control" id="exampleInputEmail1" value="{{ $val->unit_name }}" type="text" name="unit_name">
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
					   
					    var docs_type_name=$.trim($('input[name="unit_name"]').val());
					     
					
						if(docs_type_name!="")
						{				
						
							 $.ajax(
								 {
									 type:"POST",
									 data:$('form#form_docs').serialize(),
									 url:"{{route('save_edit_staff_unit')}}",
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
							    