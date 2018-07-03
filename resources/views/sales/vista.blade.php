@extends('../layouts.dash_layout')

@section('required_css')
	<link rel="stylesheet" href="{{asset('_vendor/select2/select2.min.css')}}">
	<link rel="stylesheet" href="{{asset('_vendor/DataTables/css/DT_bootstrap.css')}}">
@endsection
<?php
use Carbon\Carbon;
?>

@section('content')

		  @if( $staff_collection->isEmpty())
				<div class="alert alert-block alert-danger fade in">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
					<h4 class="alert-heading margin-bottom-10"><i class="ti-close"></i> Error!</h4>
					<p class="margin-bottom-10">
						No Staff Created
					</p>

				</div>
		  @else
			<!--  Begin Initial -->
			<div id="initial" class="init">
				 <h5 class="over-title" style="margin-top:29px !important"><span class="text-bold badge badge-success "> <?php echo $staff_collection->count() ?></span> Staff! </h5>

						<table class="table table-striped table-bordered table-hover table-full-width sample_1">
										<thead>
											<tr>
												<th></th>
												<th class="center"></th>
												<th>Staff Name | Role </th>
												<th>Gender</th>
												<th>Marital Status</th>
												<th>Email</th>
												<th>Date of Birth</th>
												<th>State</th>
												<th>Phone</th>
												<th>Address</th>


											</tr>
										</thead>
										<tbody>

										
											
											@foreach($staff_collection as $val)
											<?php
													$a=1;
											?>
											<tr>
												<td>
													@if(Route::current()->getName() == 'edit_staff')
													<i title="Edit {{ $val->first_name." ".$val->last_name }}" style="cursor: pointer" data-id="{{ $val->staff_id }}" class="fa fa-edit"></i>
 													@else
													{{$a}}
													@endif
												</td>
												<td class="center"><img class="img-rounded" height="30" width="30" src='{{ asset("storage/staff_pics/".$val->pics) }}'/></td>
												<td> {{ $val->first_name." ".$val->middle_name." ".$val->last_name }}   <code> {{ $val->role_name  }} </code></td>
												<td>{{$val->gender==0?"Female":"Male"}}</td>
												<td>{{$val->m_status==0?"Single":"Married"}}</td>
												<td>{{$val->email==""?"NIL":$val->email}}</td>
												<td>{{$val->dob==""?"NIL":$val->dob}}</td>
												<td>{{$val->state_name}}</td>
												<td><a href="tel:{{ $val->phone }}" class="btn btn-primary btn-o">Call <i class="fa fa-phone-square"></i> {{ $val->phone }}</a></td>
												<td>{{$val->residential_address==""?"NIL":$val->residential_address}}</td>

											</tr>
										    <?php $a++; ?>
											@endforeach
										</tbody>
									</table>
						<span class="clearfix"></span>

			</div>		           
			<!--  End of Initial -->		

			<style>
				/* Important part */
				
				.modal-dialog
				{
					overflow-y: initial !important;
						
				}
				.modal-body
				{
					height: 450px;
					overflow-y: auto;
				}

		   </style>	

	          <!--  Modal Modal Staff Information -->
				<div class="modal fade horizontal edit_area"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog modal-lg" style="width: 80% !important">
						<div class="modal-content">
						<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title" id="myModalLabel">Staff Detailed Information</h4>
							</div>

							<div class="modal-body" data-print="">

							</div>
							<div class="modal-footer">
								@if(Route::current()->getName() == 'vista_staff')							
								<a class="btn btn-wide btn-purple printIT"  >
							      Print <i class="fa fa-print"></i>
								</a>
								@endif
								&nbsp;&nbsp;&nbsp;
								<button type="button" class="btn btn-primary btn-o" data-dismiss="modal">
									Close
								</button>

							</div>
						</div>
					</div>
				</div>
				<!-- / Modal Staff Information -->

          @endif


@endsection

@section('required_js')
    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('_vendor/select2/select2.min.js')}}"></script>
	<script src="{{asset('_vendor/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
	<script src="{{asset('_vendor/bootstrap-checkbox/bootstrap-checkbox.js')}}"></script>
	<script src="{{asset('_vendor/DataTables/jquery.dataTables.min.js')}}"></script>
    <script>
			jQuery(document).ready(function() {
				Main.init();
			});
	</script>
@endsection

@section('additional_js')
    <script>
	 //Reset all checkboxes
	 $("input[type=checkbox]").removeAttr("checked");
		
	//Activate Data Tables
	   var oTable = $('.sample_1').dataTable({
			"aoColumnDefs" : [{
				"aTargets" : [0]
			}],
			"oLanguage" : {
				"sLengthMenu" : "Show _MENU_ Rows",
				"sSearch" : "",
				"oPaginate" : {
					"sPrevious" : "",
					"sNext" : ""
				}
			},
			"aaSorting" : [[1, 'asc']],
			"aLengthMenu" : [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"] // change per page values here
			],
			// set the initial value
			"iDisplayLength" : 30,
		});
		$('.sample_1_wrapper .dataTables_filter input').addClass("form-control input-sm").attr("placeholder", "Search Staff");
		// modify table search input
		$('.sample_1_wrapper .dataTables_length select').addClass("m-wrap small");
		// modify table per page dropdown
		$('select').select2();
		// initialzie select2 dropdown
		$('.sample_1_column_toggler input[type="checkbox"]').change(function() {
			/* Get the DataTables object again - this is not a recreation, just a get of the object */
			var iCol = parseInt($(this).attr("data-column"));
			var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
			oTable.fnSetColumnVis(iCol, ( bVis ? false : true));
		});


	$('body').on('click','i[data-id]',function(e)
	{
		e.preventDefault();

		var no=$(this).data("id");
		var toks=$("input[name='_token']").val();

			 $.ajax(
			{
				 type:"POST",
				 data:{id:no, _token:toks},
				 @if(Route::current()->getName() == 'edit_staff')
				 url:"{{ route('dynamic_staff_edit') }}",
				 @else
				 url:"{{ route('dynamic_staff_view') }}",
				 @endif
				 beforeSend:function()
				  {
					  $('table').block({ message: null }); 
					  $('div.modal-body').attr("data-print",no);
				  },
				  success: function(r)
				  {							  
					 $('table').unblock(); 
					  $('div.modal-body').html(r);
					   $('.edit_area').modal(
						   {
							backdrop: 'static',
							keyboard: false
						   });

				  }
			 }

				 );


	}
	 );

		
	</script>
@endsection
