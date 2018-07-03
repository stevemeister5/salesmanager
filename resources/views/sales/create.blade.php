@extends('../layouts.dash_layout')

@section('required_css')
	<link rel="stylesheet" href="{{asset('_vendor/select2/select2.min.css')}}">
@endsection


@section('content')

	<div class="row">
		<div class="col-md-6" style="margin-bottom: 15px">
		   <form id="form" enctype="multipart/form-data" method="post"  role="form">
			@csrf
			       <div>

	                   <div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="first_name">
										Item Name <span class="symbol required font"></span>
									</label>
									<input required value="{!! old('first_name') !!}" autocomplete="off" class="form-control underline" id="item_name" placeholder="Enter Item Name" type="text" name="item_name">
									<span class="text-danger error-message"></span>
								</div>
							</div>

						</div>

					   <div class="row">
						   <div class="col-md-12">
							   <div class="form-group">
								   <label for="item_price">
									   Item Price <span class="symbol required font"></span>
								   </label>
								   <input required value="" autocomplete="off" class="form-control underline item_price" id="item_price" placeholder="Enter Item Price" type="number" name="item_price">
								   <span class="text-danger error-message"></span>
							   </div>
						   </div>
					   </div>
					   
					    <div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="item_qty">
										Item Quantity <span class="symbol font required"></span>
									</label>
									<input required value="1" autocomplete="off" class="form-control underline item_qty" id="item_qty" placeholder="Enter Item Quantity" type="number" name="item_qty">
									<span class="text-danger error-message"></span>
								</div>
							</div>
						</div>

					   <div class="row">
						   <div class="col-md-12">
							   <div class="form-group">
								   <label for="amount">
									   Amount <span class="symbol font"></span>
								   </label>
								   <input readonly value="" autocomplete="off" class="form-control underline amount" id="amount"  type="number" name="amount">
								   <span class="text-danger error-message"></span>
							   </div>
						   </div>
					   </div>

					   <div class="row">
						   <div class="col-md-12">
							   <div class="form-group">
								   <label for="description">
									   Description/Comment <span class="symbol font"></span>
								   </label>
								   <input value="" autocomplete="off" class="form-control underline" id="description"  type="text" name="description">
								   <span class="text-danger error-message"></span>
							   </div>
						   </div>
					   </div>

                <button class="btn btn-blue btn-block btn-scroll btn-scroll-left ti-save-alt create" type="button"><span>RECORD SALE</span></button>

                <span class="clearfix"></span>

        </div>

</form>
		</div>
		<div class="col-md-6">
			<h1 style="text-transform: uppercase;color: #333; font-size: 22px; text-align: center">Today's Sale : <span style="font-size:21px" class="btn btn-squared btn-success">{{ $sales_collection->isEmpty()?"NOTHING":"N ".number_format($sales_collection->sum('amount'),2)  }}</span></h1>
			<table class="table table-striped table-bordered table-hover table-full-width sample_1">
				<thead>
				<tr>
					<th>  </th>
					<th  class="center"class="center"class="center">Name</th>
					<th  class="center"class="center"class="center">Price(N)</th>
					<th  class="center"class="center"class="center">Quantity</th>
					<th  class="center"class="center"class="center">Amount</th>
					<th  class="center"class="center"class="center">Sold By</th>
					<th  class="center"class="center"class="center">Date</th>
				</tr>
				</thead>
				<tbody>
				@if(!$sales_collection->isEmpty())
					<?php
							$a=1;
					?>
					@foreach($sales_collection as $sales)
					<tr>
					<td class="center">{{$a}}</td>
					<td class="center">{{$sales->item_name}}</td>
					<td class="center">{{number_format($sales->item_price,2)}}</td>
					<td class="center">{{$sales->item_qty}}</td>
					<td class="center">{{number_format($sales->amount,2)}}</td>
					<td class="center">{{$sales->first_name." ".$sales->middle_name." ".$sales->last_name}}</td>
					<td class="center">{{$sales->date}}</td>
				</tr>
						<?php
							$a++;
						?>
					@endforeach
				@endif
				</tbody>
			</table>
		</div>
	</div>
						

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

		//Give user progress feedback
		/*$('form#form').on('blur','input,select',(function(e)
			{
			  var $this=$(this);
			 if($.trim($this.val())!="")
				 {
					//validate 
					   $this.next('span.error-message').html('');
					   $this.closest('div.form-group').removeClass('has-error');
					   $this.closest('div.form-group').addClass('has-success');
				 }
			
	     	}));*/
		//On entering Price
        $('form').on('keyup click change','input[name="item_price"],input[name="item_qty"]',(function(e)
        {
            var $this=$(this);
            var price=$.trim($('input.item_price').val());
            var qty=$.trim($('input.item_qty').val());
			var amount=0;

			if(!isNaN(price) && !isNaN(qty)){
			    amount=price*qty;
                $('input.amount').val(amount)
			}

        }));

		
		$('form#form').on('click','button.create',(function(e)
		{
			e.preventDefault();

			var formData = new FormData($('form#form')[0]);


				 $.ajax(
						 {
							 type:"POST",
							 data:formData,
							 url:"{{route('save_sale')}}",
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
								 $('form#form')[0].reset();

								 $('html, body').animate({scrollTop:$('body').offset().top-90},2000);
								  swal("success!", "New Sale Recorded Successfully.", "success");
								  location.reload();
								 }

							  }

                        ); 

		}));


	</script>
@endsection
