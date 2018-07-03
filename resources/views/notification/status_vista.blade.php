@extends('../layouts.dash_layout')

@section('required_css')
	<link rel="stylesheet" href="{{asset('_vendor/DataTables/css/DT_bootstrap.css')}}">
@endsection
<?php
use Carbon\Carbon;
$total_notys=0;
if(!$incidence_collection->isEmpty())
    $total_notys+=$incidence_collection->count();
$id=Auth::user()->staff->staff_id;
?>

@section('content')
  @if( $total_notys==0)
		<div class="alert alert-block alert-info fade in">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
			<h4 class="alert-heading margin-bottom-10"><i class="ti-hand-stop"></i> All clear</h4>
			<p class="margin-bottom-10">
				No status updates :)
			</p>
		</div>
  @else
	<!--  Begin Initial -->
	<div id="initial" class="init" style="max-width:100%;overflow-x: auto">
		 <h5 class="over-title" style="margin-top:29px !important"><span class="text-bold badge badge-success "> <?php echo $total_notys ?></span> event(s) requires your attention</h5>

		<table class="table table-striped table-bordered table-hover table-full-width sample_1">
			<thead>
				<tr>
					<th class="center">Mark as Seen</th>
					<th class="center">Module Area</th>
					<th class="center">Description</th>
					<th class="center">Action Taken</th>
					<th class="center">Action By</th>
					<th class="center">Action Date</th>
					<th class="center">Comments</th>
				</tr>
			</thead>
			<tbody>
			<?php $a=1; ?>

			@if(!$incidence_collection->isEmpty())
				@foreach($incidence_collection as $val)
				<tr data-tr="{{$val->incidence_id}}">
					<td class="center"><input type="checkbox" class="mark"></td>
					<td>STAFF INCIDENTING</td>

					<td class="center">
						<strong>{{$id==$val->issuer_id?"You ":"$val->issuer_first_name $val->issuer_middle_name $val->issuer_last_name"}}</strong> issued
						 an incident to <img class="img-rounded" height="20" width="20" src='{{ asset("storage/staff_pics/".$val->offender_pics) }}'/>
						<strong>{{$val->offender_first_name." ".$val->offender_middle_name." ".$val->offender_last_name }}</strong> of <strong>{{$val->branch_name}}</strong> on
						<strong><?php
                        $incidence_date = new Carbon($val->incidence_date);
                        echo $incidence_date->format('jS \of F , Y \a\t h:i:s A');
                        ?></strong><br/>
						The offense name was <strong>"{{$val->offense_name}}"</strong> and the amount was <strong>{{$val->amount}}</strong>.
						{!! $val->issuer_comment==""?"No comment was given by the issuer":"The issuer left the comment: <strong>'$val->issuer_comment'</strong>"!!}
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

					<td>
						<img class="img-rounded" height="30" width="30" src='{{ asset("storage/staff_pics/".$val->action_pics) }}'/>
						{{$val->action_first_name." ".$val->action_middle_name." ".$val->action_last_name }}
					</td>

					<td>
                        <?php
                        $action_date = new Carbon($val->action_date);
                        echo $action_date->format('jS \of F , Y \a\t h:i:s A');
                        ?>
					</td>

					<td>
						{{ $val->action_comment==""?"NIL":$val->action_comment }}
					</td>


				</tr>
				<?php
				$a++;
				?>
				@endforeach
			@endif
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
		// initialzie select2 dropdown
		$('.sample_1_column_toggler input[type="checkbox"]').change(function() {
			/* Get the DataTables object again - this is not a recreation, just a get of the object */
			var iCol = parseInt($(this).attr("data-column"));
			var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
			oTable.fnSetColumnVis(iCol, ( bVis ? false : true));
		});


		//Incident Action
		$('div#initial').on('click','input.mark',function()
		{
		    $this=$(this);
		    if($this.is(':checked')){
                var id=$this.closest('tr').data('tr');
                $this.prop('disabled','disabled');
                $this.closest('tr').css('text-decoration','line-through');
                $.ajax(
                    {
                        type: "GET",
                        data: {
                            id: id
                        },
                        url: "{!! route('pending_raised_incident_mark_done') !!}",
                        beforeSend: function () {
                            $this.closest('tr').block({message: null});
                        },
                        success: function (r) {
                            $this.closest('tr').unblock();
                        }
                    }
                );

			}

		}
		);

	</script>
@endsection
