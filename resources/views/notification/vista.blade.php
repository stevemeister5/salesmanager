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
				No action required anywhere :)
			</p>
		</div>
  @else
	<!--  Begin Initial -->
	<div id="initial" class="init" style="max-width:100%;overflow-x: auto">
		 <h5 class="over-title" style="margin-top:29px !important"><span class="text-bold badge badge-success "> <?php echo $total_notys ?></span> event(s) requires your attention</h5>

		<table class="table table-striped table-bordered table-hover table-full-width sample_1">
			<thead>
				<tr>
					<th class="center"></th>
					<th class="center">Action</th>
					<th class="center">Module Area</th>
					<th class="center">Raised by</th>
					<th class="center">Description</th>
				</tr>
			</thead>
			<tbody>
			<?php $a=1; ?>

			@if(!$incidence_collection->isEmpty())
				@foreach($incidence_collection as $val)
				<tr data-tr="{{$val->incidence_id}}">
					<td class="center">{{$a}}</td>
					<td class="center">
						<span data-action="reject" class="btn btn-dark-red btn-sm btn-squared"><i class="fa fa-close"></i> REJECT</span>
						<br/><br/>
						<span data-action="approve" class="btn btn-success btn-sm btn-squared"><i class="fa fa-check-square-o"></i> APPROVE</span>
						<br/><br/>
						<span data-action="edit" class="btn btn-dark-orange btn-sm btn-squared" data-amount="{{$val->amount}}"><i class="fa fa-edit"></i> EDIT & APPROVE</span>
					</td>
					<td>STAFF INCIDENTING</td>
					<td class="center"><img class="img-rounded" height="30" width="30" src='{{ asset("storage/staff_pics/".$val->issuer_pics) }}'/>
						{{$val->issuer_first_name." ".$val->issuer_middle_name." ".$val->issuer_last_name }}
					</td>

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
				  <h4 class="modal-title" id="myModalLabel">Edit</h4>
			  </div>

			  <div class="modal-body">

			  </div>
			  <div class="modal-footer">&nbsp;&nbsp;&nbsp;
				  <button type="button" class="btn btn-primary btn-o" data-dismiss="modal">
					  Discard
				  </button>

			  </div>
		  </div>
	  </div>
  </div>
  <!-- / Modal Staff Information -->
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
		$('div#initial').on('click','span[data-action]',function()
		{
		    $this=$(this);
		    var action=$this.data("action");
            var id=$this.closest('tr').data('tr');
            var whr=$this.closest('tr').data('whr');
            switch (action) {
				case "approve":
                case "reject":
                    swal({
                            title:'Irreversible Action Alert!',
                            text: `Are you sure you want to ${action} this incident? Action is permanent and impacts on payslip!`,
                            type:'warning',
                            showCancelButton:true,
                            confirmButtonText:'Yes, Proceed with action!',
                            cancelButtonText:'No',

                        },
                        function(isConfirm)
                        {
                            if(isConfirm)
                            {
                                $.ajax(
                                    {
                                        type:"GET",
                                        data:{
                                            action:action,
                                            id:id
                                        },
                                        url:"{!! route('incidence_action_required_confirm') !!}",
                                        beforeSend:function()
                                        {
                                            $this.closest('tr').block({ message: null });
                                        },
                                        success: function(r)
                                        {
                                            $this.closest('tr').unblock();
                                            swal('Good job..','Action was successful!','success');
                                            location.reload();
                                        }
                                    }
                                );
                            }
                        }
                    );
                        break;
				case "edit":
				    var amt=$this.data('amount');
				    var id=$this.closest('tr').data('tr');
                    $('div.modal-body').html(`
					<fieldset>
					<legend>ENTER NEW AMOUNT AND COMMENT</legend>
						<div class="row">
						   <div class="col-md-12">
							   <div class="form-group">
								   <label for="amount">
									   Amount <span class="symbol required font"></span>
								   </label>
								   <input required value="" value="" autocomplete="off" class="form-control underline" id="amount"  type="text" name="amount"/>
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
								   <textarea class="form-control" name="action_comment" id="action_comment"></textarea>
								   <span class="text-danger error-message"></span>
							   </div>
						   </div>

					   </div>
					</fieldset>
                        <button data-id="${id}" class="btn btn-success btn-block btn-scroll btn-scroll-left ti-save-alt save_edit_incidence" type="button"><span>SAVE EDITS & APPROVE INCIDENCE </span></button>`);
                    $('.edit_area').modal(
                        {
                            backdrop: 'static',
                            keyboard: false
                        });
				        break;

			}
		}
		);

     $('body').on('click','button.save_edit_incidence',function() {
             var id = $(this).data('id');
             if (isNaN($('input[name="amount"]').val()) || $.trim($('input[name="amount"]').val()) == "") {
                 swal('oops', 'Number is required and must be Numeric', 'error');
             } else if ($.trim($('textarea[name="action_comment"]').val()) == "") {
                 swal('oops', 'Kindly add a comment to proceed', 'error');
                 $.ajax(
                     {
                         type: "GET",
                         data: {
                             id: id,
                             amount: $('input[name="amount"]').val(),
                             action_comment: $('textarea[name="action_comment"]').val()
                         },
                         url: "{!! route('incidence_action_required_confirm_save_edit') !!}",
                         beforeSend: function () {
                             $('.edit_area').block({message: null});
                         },
                         success: function (r) {
                             $('.edit_area').unblock();
                             swal('Good job..', 'Action was successful!', 'success');
                             location.reload();
                         }
                     }
                 );
             }
         }
     );

	</script>
@endsection
