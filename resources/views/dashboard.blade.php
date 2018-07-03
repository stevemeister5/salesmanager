@extends('layouts.dash_layout')

@section('content')

<div class="row">

		<div class="col-sm-4">
				<div class="panel panel-white no-radius text-center">
					<div class="panel-body">
						<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-smile-o fa-stack-1x fa-inverse"></i> </span>
						<h2 class="StepTitle">Manage Users</h2>
						<p class="text-small">
							To add users, you need to be signed in as the super user.
						</p>
						<p class="links cl-effect-1">
							<a href="#">
								view more
							</a>
						</p>
					</div>
				</div>
		</div>


		<div class="col-sm-4">
				<div class="panel panel-white no-radius text-center">
					<div class="panel-body">
						<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-paperclip fa-stack-1x fa-inverse"></i> </span>
						<h2 class="StepTitle">Manage Orders</h2>
						<p class="text-small">
							The Manage Orders tool provides a view of all your orders.
						</p>
						<p class="cl-effect-1">
							<a href="#">
								view more
							</a>
						</p>
					</div>
				</div>
		</div>

		<div class="col-sm-4">
				<div class="panel panel-white no-radius text-center">
					<div class="panel-body">
						<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-terminal fa-stack-1x fa-inverse"></i> </span>
						<h2 class="StepTitle">Manage Database</h2>
						<p class="text-small">
							Store, modify, and extract information from your database.
						</p>
						<p class="links cl-effect-1">
							<a href="#">
								view more
							</a>
						</p>
					</div>
				</div>
		</div>
		


</div>


        <!-- Modal Change First Password -->
        <div class="modal fade horizontal edit_area"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog modal-lg" >
                <div class="modal-content">
                <div class="modal-header">
					<img class="center-block" src="{{asset('_img/p1.gif')}}" />
                  <h3 class="modal-title text-primary" id="myModalLabel" style="text-align: center">Compulsory Password Change!</h3>
				  <p style="text-align: center">You are using the default password assigned during staff creation. Kindly enter your new password.<br/>
					 Ensure that your passwords are unique and are at least 6 characters long.
					
				  </p>
                </div>

                    <div class="modal-body">
                        <form id="new_pass" action="" method="post">
                         {{  csrf_field()  }}
                    
                            <div class="row">
                                    <div class="col-md-12">
                                            <div class="form-group">
                                                <label>
                                                    Password <span class="symbol required"></span>
                                                </label>
                                                <input name="password1" class="form-control" placeholder="Enter Password" type="password">
												<span class="text-danger error-message"></span>
                                            </div>
                                            <div class="form-group">
                                                <label>
                                                    Repeat Password <span class="symbol required"></span>
                                                </label>
                                                <input name="password2" placeholder="Confirm Password" class="form-control check" type="password">
												<span class="text-danger error-message"></span>
                                            </div>
                                        
                                        
                                        <button type="submit" class="btn btn-o btn-primary save">
                                        Save Changes
                                    </button>
                                    </div>

                                </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- / Modal Change First Password -->
		
 @endsection


@section('required_js')
    <script src="{{asset('js/main.js')}}"></script>
    <script>
			jQuery(document).ready(function() {
				Main.init();	
				
				@if(isset($psw))
				   $(".edit_area").modal
				   (
					{
						backdrop:'static',
						keyboard:false
					}
				   );
				
				$('form#new_pass').on('blur','input',(function(e)
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
				
				$('button.save').click(function(e){
					e.preventDefault();
					var formData = new FormData($('form#new_pass')[0]);
					var password1=$.trim($("input[name='password1']").val());
					var password2=$.trim($("input[name='password2']").val());
					if(password1=="" || password2=="")
					{
					swal("Error","All fields are compulsory","error");	
					}
					
					else if(password1==password2)
					{
							
					$.ajax(
						 {
							 type:"POST",
							 data:formData,
							  cache:false,
							 contentType:false,
							 processData:false,
							 url:"{{route('first_changepsw')}}",
							 beforeSend:function()
							  {
								 $('form#new_pass').block({ message: null }); 
							  },
							  error: function(r)
							  {
								  $('form#new_pass').unblock(); 
								  const errors = r.responseJSON.errors;
								    //clear any previous errors
								  $('span.error-message').html('');
								  $('div.has-error').removeClass('has-error');
								  $.each(errors,function(index,value)
									  {
											$('input[name="'+index+'"]').next('span.error-message').html(''+value);
											$('input[name"'+index+'"]').closest('div.form-group').addClass('has-error'); 
									  }
									 );
							  },
							  success: function(r)
							  {		
							    $('.edit_area').modal('hide');							
								$('form#new_pass').unblock(); 
								swal("Awesome!","New password successfully set!","success");
								  $('span.error-message').html('');
								  $('div.has-error').removeClass('has-error');
								  $('div.has-success').removeClass('has-success');
								  //clear all items
								 $('form#new_pass')[0].reset();
								
								
							  }
						 }

					 );
					}else
					{
						swal("Error","Passwords must match","error");
					}
					
				}
				);
				@endif
			});
	</script>
@endsection
