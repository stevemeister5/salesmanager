@foreach($staff_level_collection as $val)  
 <div class="panel panel-white">
			<div class="panel-body">

				<form id="form_docs" role="form">
					@csrf
				<input name="level_id" value="{{ $val->level_id }}" type="hidden"/>

					<div class="form-group">
						<label for="exampleInputEmail1">
							Level Code
						</label>
						<input class="form-control" id="exampleInputEmail1" value="{{ $val->level_code }}" type="text" name="level_code">
					</div>
					
					<div class="form-group">
						<label for="exampleInputEmail1">
							Level Salary
						</label>
						<input class="form-control" id="exampleInputEmail1" value="{{ $val->level_salary }}" type="text" name="level_salary">
					</div>
					
					<div class="form-group">
						<fieldset>
							<legend>Required Staff Level Documents</legend>
							<?php
							  $level_code=explode(',',$val->level_docs);
							 ?>
							   @foreach($staff_docs_collection as $v)
							   <div >
									<label for="{{$v->docs_type}}">
									<input 
									<?php	
										if(in_array($v->docs_id,$level_code))
										echo "checked";
									?>
									class="views" name="level_docs[]" id="{{$v->docs_type}}" value="{{ $v->docs_id }}" type="checkbox">
										{{ $v->docs_type }}
									</label>
								</div>
							   @endforeach
							
							</fieldset>
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
					   
					    var level_code=$.trim($('input[name="level_code"]').val());
					     
					
						if(level_code!="")
						{				
						
							 $.ajax(
								 {
									 type:"POST",
									 data:$('form#form_docs').serialize(),
									 url:"{{route('save_edit_staff_level')}}",
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
							    