@extends('../layouts.dash_layout')

@section('required_css')
	<link rel="stylesheet" href="{{asset('_vendor/select2/select2.min.css')}}">
@endsection


@section('content')

						@if( $branch_collection->isEmpty() || $offense_collection->isEmpty()  )
						
							<div class="alert alert-block alert-danger fade in">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
							<h4 class="alert-heading margin-bottom-10"><i class="ti-close"></i> Error!</h4>
							<p class="margin-bottom-10">
								In order to incidence a Staff, Branches and Offense Types must have already been created.<br/> If you have the requisite privilege, kindly use the menu navigation on the left to create Branches & Offenses, otherwise contact the Administrator.
							</p>

							</div>
						@endif

									
						<span class="clearfix"></span>
						<style>
							.select2-container {
								width: 100% !important;
							}
						</style>

		<div class="alert alert-block alert-success fade in">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<h4 class="alert-heading margin-bottom-10"><i class="ti-check"></i> Tip!</h4>
			<p class="margin-bottom-10">
				You must first Query branches for Staff before you can incidence a Staff.<br/>
				Simply select a branch from the branch field and click the "Query Branch(es) for Staff" button to achieve this.<br/>
				The branch field is searchable and multiple branches can be selected if available.<br/>
				<a href="#" class="btn btn-o btn-success close" data-dismiss="alert" aria-label="Close">
					Okay
				</a>
				<br/>
			</p>

		</div>

		   <form id="form" method="post"  role="form">
			@csrf
			       <div>

					   <div class="row">
						   <div class="col-md-12">

							   <div class="form-group">
								   <label for="branch_id">
									   Branches <span class="symbol required"></span>
								   </label><br/>
								   <select multiple="multiple" autocomplete="off" class="form-control" id="branch_id"  name="branch_id">
									   @if(!$branch_collection->isEmpty())
										   @foreach($branch_collection as $val)
											   <option value="{{ $val->branch_id }}">{{ $val->branch_name }}</option>
										   @endforeach
									   @endif

								   </select>
								   <span class="text-danger error-message"></span>
							   </div>
						   </div>
					   </div>

					   <div class="row">
						   <div class="col-md-6">

							   <div class="form-group">
								   <span class="btn btn-dark-purple query_branch">Query Branch(es) for Staff</span>
							   </div>
						   </div>
					   </div>

					   <div id="here" style="margin:20px 0">

					   </div>
             
                          <div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="offense_id">
										Staff Offense<span class="symbol required"></span>
									</label>
									@foreach($offense_collection as $val)
										<span style="display: none" name="offense{{$val->offense_id}}">{{$val->amount}}</span>
									@endforeach
									<select autocomplete="off" class="form-control" name="offense_id" id="offense_id">
										<option selected value="">--Select Staff Offense--</option>
										@if(!$offense_collection->isEmpty())
											@foreach($offense_collection as $val)
												<option value="{{ $val->offense_id }}">{{ $val->offense_name }} </option>
									        @endforeach
										@endif
									</select>
									<span class="text-danger error-message"></span>
								</div>
							</div>

						   </div>


					   <div class="row">
						   <div class="col-md-12">
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
						   <div class="col-md-12">
							   <div class="form-group">
								   <label for="issuer_comment">
									   Comments <span class="symbol font"></span>
								   </label>
								   <textarea class="form-control" name="issuer_comment" id="issuer_comment"></textarea>
								   <span class="text-danger error-message"></span>
							   </div>
						   </div>

					   </div>

			   
           	@if( !$branch_collection->isEmpty() || !$offense_collection->isEmpty()  )
                <button class="btn btn-success btn-block btn-scroll btn-scroll-left ti-save-alt create" type="button"><span>CREATE STAFF </span></button>
			@endif
                
                
                <span class="clearfix"></span>

        </div>
		
   
</form>
						

@endsection

@section('required_js')
    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('_vendor/select2/select2.min.js')}}"></script>
	<script src="{{asset('_vendor/DataTables/jquery.dataTables.min.js')}}"></script>
	<link rel="stylesheet" href="{{asset('_vendor/DataTables/css/DT_bootstrap.css')}}">
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

            var staff=$('input[name^="staff_id"]:checked').length;

            if(staff>0) {
                $.ajax(
                    {
                        type: "POST",
                        data: formData,
                        url: "{{route('save_staff_incidence')}}",
                        cache: false,
                        contentType: false,
                        processData: false,
                        beforeSend: function () {
                            $('form#form').block({message: null});
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
                        success: function (r) {
                            $('form#form').unblock();

                            //clear any previous errors
                            swal("success!", "Incidence successfully raised!", "success");
                            location.reload();
                        }

                    }
                );
            }else{
                swal('oops..','You must select at least one staff to incident!','error');
			}

        }));


        $('#branch_id').select2({
			placeholder:'Select Branch of Staff',
			allowClear:true
		});

		$('select#offense_id').change(function () {
			var id=$(this).val();
			var amt=$(`span[name='offense${id}']`).text();
            $('input#amount').val(amt);
        });

		$('span.query_branch').click(
		    function(){
		        var ids=$('select#branch_id').val();
		        if(ids!=null) {
                    var toks = $("input[name='_token']").val();
                    $.ajax(
                        {
                            type: "POST",
                            data: {
                                branch_ids: ids,
                                _token: toks
                            },
                            url: "{!! route('get_staff_from_branches') !!}",
                            beforeSend: function () {
                                $('div#here').block({ message: null });
                            },
                            success: function (r) {
                                $('div#here').unblock();
                                $('div#here').html(r);
                            }
                        }
                    );
                }
                else
		        sweetAlert('oops!',"You must select at least a branch to query",'error');

			}
		);
	</script>
@endsection
