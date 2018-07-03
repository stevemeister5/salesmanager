@foreach($staff_resumption_collection as $val)  
 <div class="panel panel-white">
			<div class="panel-body">

				<form id="form_docs" role="form">
					@csrf
				<input name="resume_type_id" value="{{ $val->resume_type_id }}" type="hidden"/>

					<div class="form-group">
						<label for="exampleInputEmail1">
						Resumption Type Name
						</label>
						<input class="form-control" id="exampleInputEmail1" value="{{ $val->resume_type_name }}" type="text" name="resume_type_name">
					</div>
					
					<div class="form-group">
						<label for="exampleInputEmail1">
						Start Time
						</label>
						<input class="form-control start" id="exampleInputEmail1" value="<?php echo date("h:i:s A",strtotime( $val->resume_type_start_time)); ?>" type="text" name="resume_type_start_time">
					</div>
					
					
					<div class="form-group">
						<label for="exampleInputEmail1">
						End Time
						</label>
						<input class="form-control end" id="exampleInputEmail1" value="<?php echo date("h:i:s A",strtotime($val->resume_type_end_time)) ?>" type="text" name="resume_type_end_time">
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
					   
					    var docs_type_name=$.trim($('input[name="resume_type_name"]').val());
					     
					
						if(docs_type_name!="")
						{				
						
							 $.ajax(
								 {
									 type:"POST",
									 data:$('form#form_docs').serialize(),
									 url:"{{route('save_edit_staff_resumption')}}",
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
							    