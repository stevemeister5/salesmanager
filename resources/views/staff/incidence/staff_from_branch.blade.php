<!--  Begin Initial -->
<div id="initial" class="init">
   <h5 class="over-title" style="margin-top:29px !important"><span class="text-bold badge badge-success "> <?php echo $staff_collection->count() ?></span> Staff found in branch query </h5>

   <table class="table table-striped table-bordered table-hover table-full-width sample_1">
	   <thead>
	   <tr>
		   <th><input id="all" type="checkbox"></th>
		   <th >Staff Name</th>
		   <th>Branch</th>
		   <th>Branch Type</th>
       </tr>
	   </thead>
	   <tbody>
        <?php
                $a=1;
        ?>
	   @foreach($staff_collection as $val)

		   <tr>
			   <td>
				   <input value="{{$val->staff_id}}" type="checkbox" name="staff_id[]">
			   </td>
			   <td><img class="img-rounded" height="30" width="30" src='{{ asset("storage/staff_pics/".$val->pics) }}'/>
                   {{ $val->first_name." ".$val->middle_name." ".$val->last_name." (".$val->staff_no.")" }}
               </td>

			   <td>{{$val->branch_name}}
				   @if($val->region_name!="" || !is_null($val->region_name))
					   {{ '['.$val->region_name.']' }}
				   @else
					   {{-- '[Nil]' --}}
				   @endif

				   @if($val->area_name!="" || !is_null($val->area_name))
					   {{ '['.$val->area_name.']' }}
				   @else
					   {{-- '[Nil]' --}}
				   @endif

			   </td>
               <td>
                   {{ $val->type_name==""?"NIL":$val->type_name  }}
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


<script>
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

    $('body').on('click','input#all',function () {
        if($(this).is(':checked'))
		$('input[name^="staff_id"]').prop('checked','checked')
		else
        $('input[name^="staff_id"]').removeAttr('checked');
    });
</script>

