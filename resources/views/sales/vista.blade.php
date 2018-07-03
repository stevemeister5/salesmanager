@extends('../layouts.dash_layout')

@section('required_css')
	<link rel="stylesheet" href="{{asset('_vendor/select2/select2.min.css')}}">
	<link rel="stylesheet" href="{{asset('_vendor/DataTables/css/DT_bootstrap.css')}}">
@endsection
<?php
use Carbon\Carbon;
?>

@section('content')

		  @if( $sales_collection->isEmpty())
				<div class="alert alert-block alert-danger fade in">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
					<h4 class="alert-heading margin-bottom-10"><i class="ti-close"></i> Error!</h4>
					<p class="margin-bottom-10">
						No Sales Recorded Yet
					</p>

				</div>
		  @else
			<!--  Begin Initial -->
			<div id="initial" class="init">
				<h1 style="text-transform: uppercase;color: #333; font-size: 22px; text-align: center">Total Sales : <span style="font-size:21px" class="btn btn-squared btn-success">{{ $sales_collection->isEmpty()?"NOTHING":"N ".number_format($sales_collection->sum('amount'),2)  }}</span></h1>
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
								<td class="center">{{date("h:iA \o\\n D jS F, Y",strtotime($sales->date))}}</td>
							</tr>
                            <?php
                            $a++;
                            ?>
						@endforeach
					@endif
					</tbody>
				</table>

			</div>		           
			<!--  End of Initial -->		
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
