@extends('../layouts.dash_layout')

@section('required_css')
	<link rel="stylesheet" href="{{asset('_vendor/DataTables/css/DT_bootstrap.css')}}">
@endsection
<?php
use Carbon\Carbon;
?>

@section('content')
		  @if( $incidence_collection->isEmpty())
				<div class="alert alert-block alert-danger fade in">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
					<h4 class="alert-heading margin-bottom-10"><i class="ti-close"></i> Error!</h4>
					<p class="margin-bottom-10">
						No Incidence(s) Created
					</p>

				</div>
		  @else
			<!--  Begin Initial -->
			<div id="initial" class="init">
				 <h5 class="over-title" style="margin-top:29px !important"><span class="text-bold badge badge-success "> <?php echo $incidence_collection->count() ?></span> incidence(s) </h5>

						<table class="table table-striped table-bordered table-hover table-full-width sample_1">
										<thead>
											<tr>
												<th></th>
												<th>Raised by</th>
												<th>Offense</th>
												<th>Amount</th>
												<th>Issuer Comment</th>
												<th>Date Issued</th>
												<th>Offender</th>
												<th>Offender Branch</th>
												<th>Status</th>
												<th>Action by</th>
												<th>Action Comment</th>
												<th>Action Date</th>

											</tr>
										</thead>
										<tbody>

										<?php $a=1; ?>

											@foreach($incidence_collection as $val)
											<tr>
												<td>{{$a}}</td>
												<td><img class="img-rounded" height="30" width="30" src='{{ asset("storage/staff_pics/".$val->issuer_pics) }}'/>
													{{$val->issuer_first_name." ".$val->issuer_middle_name." ".$val->issuer_last_name }}
												</td>
												<td>{{$val->offense_name}}</td>
												<td>{{$val->amount}}</td>
												<td>{{$val->issuer_comment}}</td>
												<td>
                                                    <?php
                                                    $incidence_date = new Carbon($val->incidence_date);
                                                    echo $incidence_date->format('jS F , Y h:i:s A');
                                                    ?>
												</td>
												<td><img class="img-rounded" height="30" width="30" src='{{ asset("storage/staff_pics/".$val->offender_pics) }}'/>
													{{$val->offender_first_name." ".$val->offender_middle_name." ".$val->offender_last_name }}
												</td>
												<td>{{$val->branch_name}} <br/><span class="label
													label-<?php
                                                    if($val->type=="Regular")
                                                        echo 'default';
													elseif($val->type=="HUB 1")
                                                        echo 'success';
													elseif($val->type=="HUB 2")
                                                        echo 'warning' ;
													elseif($val->type=="Area Office")
                                                        echo 'danger' ;
                                                    else
                                                        echo 'info' ;
                                                    ?>"> {{$val->type==""?"MAIN HEAD OFFICE":$val->type}} </span>
												</td>
												<td>
													@if($val->action==0)
													{!!   "<span class='btn btn-sm btn-warning'>PENDING</span>" !!}
													@elseif($val->action==1)
													{!!   "<span class='btn btn-sm btn-success'>APPROVED</span>" !!}
													@else
													{!!   "<span class='btn btn-sm btn-danger'>REJECTED</span>" !!}
													@endif
												</td>
												<td><img class="img-rounded" height="30" width="30" src='{{ asset("storage/staff_pics/".$val->action_pics) }}'/>
													{{$val->action_first_name." ".$val->action_middle_name." ".$val->action_last_name }}
												</td>
												<td>
													{{ $val->action_comment==""?"NIL":$val->action_comment }}
												</td>
												<td>
                                                    <?php
                                                    $action_date = new Carbon($val->action_date);
                                                    echo $action_date->format('jS F , Y h:i:s A');
                                                    ?>
												</td>

											</tr>
										    <?php
											$a++;
											?>
											@endforeach
										</tbody>
									</table>
						<span class="clearfix"></span>

			</div>		           
			<!--  End of Initial -->		



          @endif


@endsection

@section('required_js')
    <script src="{{asset('js/main.js')}}"></script>
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
		// initialzie select2 dropdown
		$('.sample_1_column_toggler input[type="checkbox"]').change(function() {
			/* Get the DataTables object again - this is not a recreation, just a get of the object */
			var iCol = parseInt($(this).attr("data-column"));
			var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
			oTable.fnSetColumnVis(iCol, ( bVis ? false : true));
		});

		
	</script>
@endsection
