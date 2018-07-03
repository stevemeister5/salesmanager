@foreach($doc_type_collection as $val)  
 <div class="panel panel-white">
			<div class="panel-body">

				<form id="form_docs" role="form">
					@csrf
				<input name="docs_id" value="{{ $val->docs_id }}" type="hidden"/>

					<div class="form-group">
						<label for="exampleInputEmail1">
							Document Type
						</label>
						<input class="form-control" id="exampleInputEmail1" value="{{ $val->docs_type }}" type="text" name="docs_type">
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
					   
					    var docs_type_name=$.trim($('input[name="docs_type"]').val());
					     
					
						if(docs_type_name!="")
						{				
						
							 $.ajax(
								 {
									 type:"POST",
									 data:$('form#form_docs').serialize(),
									 url:"{{route('save_edit_doc_type')}}",
									 beforeSend:function()
									  {
										  $('form#form_docs').block({ message: null }); 
									  },
									  success: function(r)
									  {							  
										 $('form#form_docs').unblock(); 
										 
											//We need to update the row of the table that was edited
											 
											//New Edited Values
																			
											 
											 var updated_tr="<tr data-id='{{ $val->docs_id }}'><td style='width: 30px'><i data-action='edit' style='cursor: pointer' class='ti-pencil-alt' data-placement='right' data-toggle='tooltip' data-original-title='Edit "+docs_type_name+"'> </i> </td><td class='center'>"+docs_type_name+"</td></tr>";
											 
											 $("tr[data-id={{ $val->docs_id }}]").replaceWith(updated_tr);
											 
											 swal("success!", "Operation was successful", "success");
											 $('.edit_area').modal('toggle');
										 
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
							    