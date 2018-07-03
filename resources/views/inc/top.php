<header class="navbar navbar-default"><!-- navbar-default navbar-static-top-->
					<!-- start: NAVBAR HEADER -->
					<div class="navbar-header">
						<a href="#" class="sidebar-mobile-toggler pull-left hidden-md hidden-lg" data-toggle-class="app-slide-off" data-toggle-target="#app" data-toggle-click-outside="#sidebar">
							<i class="ti-align-justify"></i>
						</a>
						<a class="navbar-brand" href="<?php echo route('dashboard') ?>">
						SALES MANAGER
						</a>
						<a href="#" class="sidebar-toggler pull-right visible-md visible-lg" data-toggle-class="app-sidebar-closed" data-toggle-target="#app">
							<i class="ti-align-justify"></i>
						</a>
						<a class="pull-right menu-toggler visible-xs-block" id="menu-toggler" data-toggle="collapse" href=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<i class="ti-view-grid"></i>
						</a>
					</div>
					<!-- end: NAVBAR HEADER -->
					<!-- start: NAVBAR COLLAPSE -->
					<div class="navbar-collapse collapse" >
						<ul class="nav navbar-right">
							<!-- start: MESSAGES DROPDOWN -->
							<li class="dropdown">
								<a href class="dropdown-toggle" data-toggle="dropdown">
									<span class="dot-badge partition-red"></span> <i class="ti-comment"></i> <span>MESSAGES</span>
								</a>
								<ul class="dropdown-menu dropdown-light dropdown-messages dropdown-large">
									<li>
										<span class="dropdown-header"> Unread messages</span>
									</li>
									<li>
									Messages to appear here after implementation
										<!--<div class="drop-down-wrapper ps-container">
											<ul>
												<li class="unread">
													<a href="javascript:;" class="unread">
														<div class="clearfix">
															<div class="thread-image">
																<img src="./assets/images/avatar-2.jpg" alt="">
															</div>
															<div class="thread-content">
																<span class="author">Nicole Bell</span>
																<span class="preview">Duis mollis, est non commodo luctus, nisi erat porttitor ligula...</span>
																<span class="time"> Just Now</span>
															</div>
														</div>
													</a>
												</li>
												<li>
													<a href="javascript:;" class="unread">
														<div class="clearfix">
															<div class="thread-image">
																<img src="./assets/images/avatar-3.jpg" alt="">
															</div>
															<div class="thread-content">
																<span class="author">Steven Thompson</span>
																<span class="preview">Duis mollis, est non commodo luctus, nisi erat porttitor ligula...</span>
																<span class="time">8 hrs</span>
															</div>
														</div>
													</a>
												</li>
												<li>
													<a href="javascript:;">
														<div class="clearfix">
															<div class="thread-image">
																<img src="./assets/images/avatar-5.jpg" alt="">
															</div>
															<div class="thread-content">
																<span class="author">Kenneth Ross</span>
																<span class="preview">Duis mollis, est non commodo luctus, nisi erat porttitor ligula...</span>
																<span class="time">14 hrs</span>
															</div>
														</div>
													</a>
												</li>
											</ul>
										</div>-->
									</li>
									<li class="view-all">
										<a href="#">
											See All
										</a>
									</li>
								</ul>
							</li>
							<!-- end: MESSAGES DROPDOWN -->

				<!-- start: NOTIFICATION DROPDOWN -->
                <?php
                //USE THIS FOR ALL NOTIFICATION CODING, NOT JUST FOR STOCKING
               /* const OPERATION = 'operation';
                const APPROVED = 'approved';
                const ASSETS_STORE_ID = 'assets_store_id';
                $total_notys=0;
                $stock_noty=array();
                $alloc_noty=array();
                $dealloc_noty=array();
                $transfer_noty=array();
                $pending_incident_approval_required_noty=array();
                $pending_raised_incident_status_noty=array();*/

                $id=Auth::user()->staff->staff_id;
               
                /*if(DB::table('tbl_staff as s')->leftjoin('tbl_branches as b','s.branch_id','=','b.branch_id')
                ->select('s.*','type_id')->where('s.staff_id',$id)->exists())
                   {
                        $noty_query=DB::table('tbl_staff as s')
                        ->leftjoin('tbl_branches as b','s.branch_id','=','b.branch_id')
                        ->select('s.branch_id as sid', 'god_eye','gm','mgr','area_sup','type_id','area_id','region_id')
                        ->where('s.staff_id',$id)
                        ->get();

                        $noty_my_branch_id=$noty_query[0]->sid;
                        $noty_my_branch_type_id=$noty_query[0]->type_id;
                        $noty_god_eye=$noty_query[0]->god_eye;
                        $noty_gm=$noty_query[0]->gm;
                        $noty_mgr=$noty_query[0]->mgr;
                        $noty_area_id=$noty_query[0]->area_id;
                        $noty_region_id=$noty_query[0]->region_id;
                   }*/

                #####  PENDING RAISED INCIDENCE STATUS #######
                //I think this is same for everyone
                /*$incidence_collection=DB::table('tbl_staff_incidence as i')
                    ->leftjoin('tbl_staff as issuer_staff','issuer_staff.staff_id','=','i.issuer_id')
                    ->leftjoin('tbl_staff as offender_staff','offender_staff.staff_id','=','i.offender_id')
                    ->leftjoin('tbl_staff as action_staff','action_staff.staff_id','=','i.action_id')
                    ->leftjoin('tbl_branches as offender_branch','offender_branch.branch_id','=','offender_staff.branch_id')
                    ->leftjoin('tbl_branch_type as t','t.type_id','=','offender_branch.type_id')
                    ->leftjoin('tbl_offense as o','o.offense_id','=','i.offense_id')
                    ->select('incidence_id as id')
                    ->where('issuer_id',$id)
                    ->where('action','<>',0)
                    ->where('issuer_seen',0)
                    ->get();*/

                /*if(!$incidence_collection->isEmpty())
                {
                    foreach($incidence_collection as $val)
                    {
                        $pending_raised_incident_status_noty[] = $val -> id;
                    }
                    $noty_avail="";
                    $total_notys+=count($pending_raised_incident_status_noty);
                }*/



                #####  PENDING INCIDENT APPROVAL REQUIRED #######
                //God Eye can see and approve all pending incidences
                //General Manager can see and all pending incidences not raised by him/her
//               if($noty_god_eye)
//                {
//                    $incidence_collection=DB::table('tbl_staff_incidence as i')
//                        ->leftjoin('tbl_staff as issuer_staff','issuer_staff.staff_id','=','i.issuer_id')
//                        ->leftjoin('tbl_staff as offender_staff','offender_staff.staff_id','=','i.offender_id')
//                        ->leftjoin('tbl_staff as action_staff','action_staff.staff_id','=','i.action_id')
//                        ->leftjoin('tbl_branches as offender_branch','offender_branch.branch_id','=','offender_staff.branch_id')
//                        ->leftjoin('tbl_branch_type as t','t.type_id','=','offender_branch.type_id')
//                        ->leftjoin('tbl_offense as o','o.offense_id','=','i.offense_id')
//                        ->select('incidence_id as id')
//                        ->where('action',0)
//                        ->get();
//
//                    if(!$incidence_collection->isEmpty())
//                    {
//                        foreach($incidence_collection as $val)
//                        {
//                            $pending_incident_approval_required_noty[] = $val -> id;
//                        }
//                        $noty_avail="";
//                        $total_notys+=count($pending_incident_approval_required_noty);
//                    }
//
//                 }
//                elseif($noty_gm)
//                 {
//                    $incidence_collection=DB::table('tbl_staff_incidence as i')
//                        ->leftjoin('tbl_staff as issuer_staff','issuer_staff.staff_id','=','i.issuer_id')
//                        ->leftjoin('tbl_staff as offender_staff','offender_staff.staff_id','=','i.offender_id')
//                        ->leftjoin('tbl_staff as action_staff','action_staff.staff_id','=','i.action_id')
//                        ->leftjoin('tbl_branches as offender_branch','offender_branch.branch_id','=','offender_staff.branch_id')
//                        ->leftjoin('tbl_branch_type as t','t.type_id','=','offender_branch.type_id')
//                        ->leftjoin('tbl_offense as o','o.offense_id','=','i.offense_id')
//                        ->select('incidence_id as id')
//                        ->where('action',0)
//                        ->where('issuer_staff.staff_id','<>',$id)
//                        ->get();
//
//                    if(!$incidence_collection->isEmpty())
//                    {
//                        foreach($incidence_collection as $val)
//                        {
//                            $pending_incident_approval_required_noty[] = $val -> id;
//                        }
//                        $noty_avail="";
//                        $total_notys+=count($pending_incident_approval_required_noty);
//                    }
//                 }
//                else if($noty_mgr) {
//                    //Which Manager are you?
//                    switch ($noty_my_branch_type_id)
//                    {
//                        case "0": // HEAD OFFICE MANAGER
//                            $incidence_collection=DB::table('tbl_staff_incidence as i')
//                                ->leftjoin('tbl_staff as issuer_staff','issuer_staff.staff_id','=','i.issuer_id')
//                                ->leftjoin('tbl_staff as offender_staff','offender_staff.staff_id','=','i.offender_id')
//                                ->leftjoin('tbl_staff as action_staff','action_staff.staff_id','=','i.action_id')
//                                ->leftjoin('tbl_branches as offender_branch','offender_branch.branch_id','=','offender_staff.branch_id')
//                                ->leftjoin('tbl_branch_type as t','t.type_id','=','offender_branch.type_id')
//                                ->leftjoin('tbl_offense as o','o.offense_id','=','i.offense_id')
//                                ->select('incidence_id as id')
//                                ->where('action',0)
//                                ->where('issuer_staff.staff_id','<>',$id)
//                                ->where('offender_branch.branch_id',$noty_my_branch_id)
//                                ->get();
//
//                            if(!$incidence_collection->isEmpty())
//                            {
//                                foreach($incidence_collection as $val)
//                                {
//                                    $pending_incident_approval_required_noty[] = $val -> id;
//                                }
//                                $noty_avail="";
//                                $total_notys+=count($pending_incident_approval_required_noty);
//                            }
//
//                         break;
//
//                        case "1": // REGULAR BRANCH  MANAGER
//                            $incidence_collection=DB::table('tbl_staff_incidence as i')
//                                ->leftjoin('tbl_staff as issuer_staff','issuer_staff.staff_id','=','i.issuer_id')
//                                ->leftjoin('tbl_staff as offender_staff','offender_staff.staff_id','=','i.offender_id')
//                                ->leftjoin('tbl_staff as action_staff','action_staff.staff_id','=','i.action_id')
//                                ->leftjoin('tbl_branches as offender_branch','offender_branch.branch_id','=','offender_staff.branch_id')
//                                ->leftjoin('tbl_branch_type as t','t.type_id','=','offender_branch.type_id')
//                                ->leftjoin('tbl_offense as o','o.offense_id','=','i.offense_id')
//                                ->select('incidence_id as id')
//                                ->where('action',0)
//                                ->where('issuer_staff.staff_id','<>',$id)
//                                ->where('offender_branch.branch_id',$noty_my_branch_id)
//                                ->get();
//
//                            if(!$incidence_collection->isEmpty())
//                            {
//                                foreach($incidence_collection as $val)
//                                {
//                                    $pending_incident_approval_required_noty[] = $val -> id;
//                                }
//                                $noty_avail="";
//                                $total_notys+=count($pending_incident_approval_required_noty);
//                            }
//
//                         break;
//
//                        case "2": // HUB1  MANAGER
//                            $incidence_collection=DB::table('tbl_staff_incidence as i')
//                                ->leftjoin('tbl_staff as issuer_staff','issuer_staff.staff_id','=','i.issuer_id')
//                                ->leftjoin('tbl_staff as offender_staff','offender_staff.staff_id','=','i.offender_id')
//                                ->leftjoin('tbl_staff as action_staff','action_staff.staff_id','=','i.action_id')
//                                ->leftjoin('tbl_branches as offender_branch','offender_branch.branch_id','=','offender_staff.branch_id')
//                                ->leftjoin('tbl_branch_type as t','t.type_id','=','offender_branch.type_id')
//                                ->leftjoin('tbl_offense as o','o.offense_id','=','i.offense_id')
//                                ->select('incidence_id as id')
//                                ->where('action',0)
//                                ->where('issuer_staff.staff_id','<>',$id)
//                                ->where('offender_branch.branch_id',$noty_my_branch_id)
//                                ->orWhere('offender_branch.branch_reports_to',$noty_my_branch_id)
//                                ->get();
//
//                            if(!$incidence_collection->isEmpty())
//                            {
//                                foreach($incidence_collection as $val)
//                                {
//                                    $pending_incident_approval_required_noty[] = $val -> id;
//                                }
//                                $noty_avail="";
//                                $total_notys+=count($pending_incident_approval_required_noty);
//                            }
//                         break;
//
//                        case "3"://HUB2 MANAGER
//                            $incidence_collection=DB::table('tbl_staff_incidence as i')
//                                ->leftjoin('tbl_staff as issuer_staff','issuer_staff.staff_id','=','i.issuer_id')
//                                ->leftjoin('tbl_staff as offender_staff','offender_staff.staff_id','=','i.offender_id')
//                                ->leftjoin('tbl_staff as action_staff','action_staff.staff_id','=','i.action_id')
//                                ->leftjoin('tbl_branches as offender_branch','offender_branch.branch_id','=','offender_staff.branch_id')
//                                ->leftjoin('tbl_branch_type as t','t.type_id','=','offender_branch.type_id')
//                                ->leftjoin('tbl_offense as o','o.offense_id','=','i.offense_id')
//                                ->select('incidence_id as id')
//                                ->where('action',0)
//                                ->where('issuer_staff.staff_id','<>',$id)
//                                ->where('offender_branch.branch_id',$noty_my_branch_id)
//                                ->orWhere('offender_branch.branch_reports_to',$noty_my_branch_id)
//                                ->get();
//
//                            if(!$incidence_collection->isEmpty())
//                            {
//                                foreach($incidence_collection as $val)
//                                {
//                                    $pending_incident_approval_required_noty[] = $val -> id;
//                                }
//                                $noty_avail="";
//                                $total_notys+=count($pending_incident_approval_required_noty);
//                            }
//
//                         break;
//
//                        case "4"://AREA OFFICE MANAGER
//                            $incidence_collection=DB::table('tbl_staff_incidence as i')
//                                ->leftjoin('tbl_staff as issuer_staff','issuer_staff.staff_id','=','i.issuer_id')
//                                ->leftjoin('tbl_staff as offender_staff','offender_staff.staff_id','=','i.offender_id')
//                                ->leftjoin('tbl_staff as action_staff','action_staff.staff_id','=','i.action_id')
//                                ->leftjoin('tbl_branches as offender_branch','offender_branch.branch_id','=','offender_staff.branch_id')
//                                ->leftjoin('tbl_branch_type as t','t.type_id','=','offender_branch.type_id')
//                                ->leftjoin('tbl_offense as o','o.offense_id','=','i.offense_id')
//                                ->select('incidence_id as id')
//                                ->where('action',0)
//                                ->where('issuer_staff.staff_id','<>',$id)
//                                ->where('offender_branch.branch_id',$noty_my_branch_id)
//                                ->orWhere('offender_branch.area_id',$noty_area_id)
//                                ->get();
//
//                            if(!$incidence_collection->isEmpty())
//                            {
//                                foreach($incidence_collection as $val)
//                                {
//                                    $pending_incident_approval_required_noty[] = $val -> id;
//                                }
//                                $noty_avail="";
//                                $total_notys+=count($pending_incident_approval_required_noty);
//                            }
//
//                         break;
//
//                        case "5"://REGIONAL OFFICE MANAGER
//                            $incidence_collection=DB::table('tbl_staff_incidence as i')
//                                ->leftjoin('tbl_staff as issuer_staff','issuer_staff.staff_id','=','i.issuer_id')
//                                ->leftjoin('tbl_staff as offender_staff','offender_staff.staff_id','=','i.offender_id')
//                                ->leftjoin('tbl_staff as action_staff','action_staff.staff_id','=','i.action_id')
//                                ->leftjoin('tbl_branches as offender_branch','offender_branch.branch_id','=','offender_staff.branch_id')
//                                ->leftjoin('tbl_branch_type as t','t.type_id','=','offender_branch.type_id')
//                                ->leftjoin('tbl_offense as o','o.offense_id','=','i.offense_id')
//                                ->select('incidence_id as id')
//                                ->where('action',0)
//                                ->where('issuer_staff.staff_id','<>',$id)
//                                ->where('offender_branch.branch_id',$noty_my_branch_id)
//                                ->orWhere('offender_branch.region_id',$noty_region_id)
//                                ->get();
//
//                            if(!$incidence_collection->isEmpty())
//                            {
//                                foreach($incidence_collection as $val)
//                                {
//                                    $pending_incident_approval_required_noty[] = $val -> id;
//                                }
//                                $noty_avail="";
//                                $total_notys+=count($pending_incident_approval_required_noty);
//                            }
//
//                        break;
//
//                    }
//               }

                #####  STOCK APPROVAL CHECKING #######
                //only God-Eyes and Managers of branches(except regular types) can approve stocking operations             
                 //If current staff is GodEye, display all pending stocking approval requests
                //else if manager, check if there's a pending request in your branch(of course not made by you)
                //Area Office Managers will check ...
                //Regional Office Managers will check..
                //Head Office Manager
                            
//                  if($noty_god_eye)
//                  {
//
//                    if(App\Asset_Store::select('assets_store_id as id')->where(OPERATION,1)->where(APPROVED,0)->exists())
//                        {
//                            $res= App\Asset_Store::select('assets_store_id as id')->where(OPERATION,1)->where(APPROVED,0)->get();
//                            foreach($res as $r)
//                            {
//                                $stock_noty[] = $r -> id;
//                            }
//                            $noty_avail="";
//                            $total_notys+=count($stock_noty);
//                        }
//
//
//                 }
//                  else if($noty_mgr)
//                  {
//
//                   //Which Manager are you?
//                     switch($noty_my_branch_type_id)
//                     {
//                         case "0": // HEAD OFFICE MANAGER
//                           // I need all pending approvals in my branch not raised by me
//
//                                if(App\Asset_Store::select('assets_store_id as id')->where(OPERATION,1)->where(APPROVED,0)
//                                    ->where('store_id',$noty_my_branch_id)->where('action_by','!=',$id)->exists())
//                                {
//                                    $res= App\Asset_Store::select('assets_store_id as id')->where(OPERATION,1)->where(APPROVED,0)
//                                    ->where('store_id',$noty_my_branch_id)->where('action_by','!=',$id)->get();
//                                    foreach($res as $r)
//                                    {
//                                        $stock_noty[] = $r -> id;
//                                    }
//                                    $noty_avail="";
//                                    $total_notys+=count($stock_noty);
//                                }
//
//                             break;
//
//                         case "2": // HUB1  MANAGER
//                             // I need all pending approvals in my branch not raised by me
//                             if(App\Asset_Store::select('assets_store_id as id')->where(OPERATION,1)->where(APPROVED,0)
//                             ->where('store_id',$noty_my_branch_id)->where('action_by','!=',$id)->exists())
//                            {
//                                $res= App\Asset_Store::select('assets_store_id as id')->where(OPERATION,1)->where(APPROVED,0)
//                                ->where('store_id',$noty_my_branch_id)->where('action_by','!=',$id)->get();
//                                foreach($res as $r)
//                                {
//                                    $stock_noty[] = $r -> id;
//                                }
//                                $noty_avail="";
//                                $total_notys+=count($stock_noty);
//                            }
//
//
//                             break;
//
//
//                         case "3":  // HUB2 MANAGER
//                             // I need all pending approvals in my branch not raised by me
//
//                             if(App\Asset_Store::select('assets_store_id as id')->where(OPERATION,1)->where(APPROVED,0)
//                             ->where('store_id',$noty_my_branch_id)->where('action_by','!=',$id)->exists())
//                                {
//                                    $res= App\Asset_Store::select('assets_store_id as id')->where(OPERATION,1)->where(APPROVED,0)
//                                    ->where('store_id',$noty_my_branch_id)->where('action_by','!=',$id)->get();
//                                    foreach($res as $r)
//                                    {
//                                        $stock_noty[] = $r -> id;
//                                    }
//                                    $noty_avail="";
//                                    $total_notys+=count($stock_noty);
//                                }
//
//
//                             break;
//
//                         case "4": // AREA OFFICE MANAGER
//                             // I need all pending approvals in my branch not raised by me
//
//                             if(App\Asset_Store::select('assets_store_id as id')->where(OPERATION,1)->where(APPROVED,0)
//                             ->where('store_id',$noty_my_branch_id)->where('action_by','!=',$id)->exists())
//                                {
//                                    $res= App\Asset_Store::select('assets_store_id as id')->where(OPERATION,1)->where(APPROVED,0)
//                                    ->where('store_id',$noty_my_branch_id)->where('action_by','!=',$id)->get();
//                                    foreach($res as $r)
//                                    {
//                                        $stock_noty[] = $r -> id;
//                                    }
//                                    $noty_avail="";
//                                    $total_notys+=count($stock_noty);
//                                }
//
//                            //TODO
//                             //I also need all pending aprovals in my area raised by HUB1 Managers
//                             /*  $query=mysqli_query($connection,"select assets_store_id from tbl_assets_store
//                            where operation=1 and approved=0 and store_id IN (select branch_id from tbl_branches where area_id='$noty_area_id' and type_id=2) and action_by!='$id' and action_by IN (select staff_id from tbl_staff where mgr=1)
//                            ") or trigger_error("Query Failed! SQL: - Error: ". mysqli_error($connection), E_USER_ERROR);
//                            if(mysqli_num_rows($query)>0)
//                                 {
//                                    while($row=mysqli_fetch_assoc($query))
//                                    {
//                                        $stock_noty[]=$row['assets_store_id'];
//                                    }
//
//                                        $noty_avail="";
//                                        $total_notys+=count($stock_noty);
//                                 } */
//                             break;
//
//                         case "5":  // REGIONAL OFFICE MANAGER
//
//                            // I need all pending approvals in my branch not raised by me
//
//                            if(App\Asset_Store::select('assets_store_id as id')->where(OPERATION,1)->where(APPROVED,0)
//                            ->where('store_id',$noty_my_branch_id)->where('action_by','!=',$id)->exists())
//                            {
//                                $res= App\Asset_Store::select('assets_store_id as id')->where(OPERATION,1)->where(APPROVED,0)
//                                ->where('store_id',$noty_my_branch_id)->where('action_by','!=',$id)->get();
//                                foreach($res as $r)
//                                {
//                                    $stock_noty[] = $r -> id;
//                                }
//                                $noty_avail="";
//                                $total_notys+=count($stock_noty);
//                            }
//
//                            //TODO
//                             //I also need all pending aprovals in my region raised by AREA or HUB2 managers
//                             /*  $query=mysqli_query($connection,"select assets_store_id from tbl_assets_store
//                            where operation=1 and approved=0 and store_id IN (select branch_id from tbl_branches where region_id='$noty_region_id' and type_id=3 or type_id=4) and action_by!='$id' and action_by IN (select staff_id from tbl_staff where mgr=1)
//                            ") or trigger_error("Query Failed! SQL: - Error: ". mysqli_error($connection), E_USER_ERROR);
//                            if(mysqli_num_rows($query)>0)
//                                 {
//                                    while($row=mysqli_fetch_assoc($query))
//                                    {
//                                        $stock_noty[]=$row['assets_store_id'];
//                                    }
//
//                                        $noty_avail="";
//                                        $total_notys+=count($stock_noty);
//                                 } */
//                             break;
//
//                     }
//                  }
                            
      
                            
                ##### ALLOCATION APPROVAL CHECKING #######
                //only God-Eyes and Managers of branches(except regular types) can approve allocation operations             
                 //If current staff is GodEye, display all pending allocation approval requests
                //else if manager, check if there's a pending request in your branch(of course not made by you)
                //Area Office Managers will check ...
                //Regional Office Managers will check..
                //Head Office Manager
                            
//                  if($noty_god_eye)
//                  {
//                    //select all pending stock approval requests
//                    if(App\Asset_Store::select('assets_store_id as id')->where(OPERATION,2)->where(APPROVED,0)->exists())
//                    {
//                        $res= App\Asset_Store::select('assets_store_id as id')->where(OPERATION,2)->where(APPROVED,0)->get();
//                        foreach($res as $r)
//                        {
//                            $alloc_noty[] = $r -> id;
//                        }
//                        $noty_avail="";
//                        $total_notys+=count($alloc_noty);
//                    }
//
//                 }
//                  else if($noty_mgr)
//                  {
//
//                   //Which Manager are you?
//                     switch($noty_my_branch_type_id)
//                     {
//                         case "0": // HEAD OFFICE MANAGER
//                           // I need all pending approvals in my branch not raised by me
//
//                           if(App\Asset_Store::select('assets_store_id as id')->where(OPERATION,2)->where(APPROVED,0)
//                           ->where('store_id',$noty_my_branch_id)->where('action_by','!=',$id)->exists())
//                           {
//                               $res= App\Asset_Store::select('assets_store_id as id')->where(OPERATION,2)->where(APPROVED,0)
//                               ->where('store_id',$noty_my_branch_id)->where('action_by','!=',$id)->get();
//                               foreach($res as $r)
//                               {
//                                   $alloc_noty[] = $r -> id;
//                               }
//                               $noty_avail="";
//                               $total_notys+=count($alloc_noty);
//                           }
//
//                             break;
//
//                         case "2": // HUB1  MANAGER
//                             // I need all pending approvals in my branch not raised by me
//
//
//                             if(App\Asset_Store::select('assets_store_id as id')->where(OPERATION,2)->where(APPROVED,0)
//                                 ->where('store_id',$noty_my_branch_id)->where('action_by','!=',$id)->exists())
//                             {
//                                 $res= App\Asset_Store::select('assets_store_id as id')->where(OPERATION,2)->where(APPROVED,0)
//                                     ->where('store_id',$noty_my_branch_id)->where('action_by','!=',$id)->get();
//                                 foreach($res as $r)
//                                 {
//                                     $alloc_noty[] = $r -> id;
//                                 }
//                                 $noty_avail="";
//                                 $total_notys+=count($alloc_noty);
//                             }
//
//
//                             break;
//
//
//                         case "3":  // HUB2 MANAGER
//                             // I need all pending approvals in my branch not raised by me
//
//                             if(App\Asset_Store::select('assets_store_id as id')->where(OPERATION,2)->where(APPROVED,0)
//                                 ->where('store_id',$noty_my_branch_id)->where('action_by','!=',$id)->exists())
//                             {
//                                 $res= App\Asset_Store::select('assets_store_id as id')->where(OPERATION,2)->where(APPROVED,0)
//                                     ->where('store_id',$noty_my_branch_id)->where('action_by','!=',$id)->get();
//                                 foreach($res as $r)
//                                 {
//                                     $alloc_noty[] = $r -> id;
//                                 }
//                                 $noty_avail="";
//                                 $total_notys+=count($alloc_noty);
//                             }
//
//                             break;
//
//                         case "4": // AREA OFFICE MANAGER
//                             // I need all pending approvals in my branch not raised by me
//                             if(App\Asset_Store::select('assets_store_id as id')->where(OPERATION,2)->where(APPROVED,0)
//                                 ->where('store_id',$noty_my_branch_id)->where('action_by','!=',$id)->exists())
//                             {
//                                 $res= App\Asset_Store::select('assets_store_id as id')->where(OPERATION,2)->where(APPROVED,0)
//                                     ->where('store_id',$noty_my_branch_id)->where('action_by','!=',$id)->get();
//                                 foreach($res as $r)
//                                 {
//                                     $alloc_noty[] = $r -> id;
//                                 }
//                                 $noty_avail="";
//                                 $total_notys+=count($alloc_noty);
//                             }
//
//
//                             //I also need all pending approvals in my area raised by HUB1 Managers
//                              /*$query=mysqli_query($connection,"select assets_store_id from tbl_assets_store
//                            where operation=2 and approved=0 and store_id IN (select branch_id from tbl_branches where area_id='$noty_area_id' and type_id=2) and action_by!='$id' and action_by IN (select staff_id from tbl_staff where mgr=1)
//                            ") or trigger_error("Query Failed! SQL: - Error: ". mysqli_error($connection), E_USER_ERROR);
//                            if(mysqli_num_rows($query)>0)
//                                 {
//                                    while($row=mysqli_fetch_assoc($query))
//                                    {
//                                        $alloc_noty[]=$row[ASSETS_STORE_ID];
//                                    }
//
//                                        $noty_avail="";
//                                        $total_notys+=count($alloc_noty);
//                                 }*/
//                             break;
//
//                         case "5":  // REGIONAL OFFICE MANAGER
//
//                            // I need all pending approvals in my branch not raised by me
//
//                             if(App\Asset_Store::select('assets_store_id as id')->where(OPERATION,2)->where(APPROVED,0)
//                                 ->where('store_id',$noty_my_branch_id)->where('action_by','!=',$id)->exists())
//                             {
//                                 $res= App\Asset_Store::select('assets_store_id as id')->where(OPERATION,2)->where(APPROVED,0)
//                                     ->where('store_id',$noty_my_branch_id)->where('action_by','!=',$id)->get();
//                                 foreach($res as $r)
//                                 {
//                                     $alloc_noty[] = $r -> id;
//                                 }
//                                 $noty_avail="";
//                                 $total_notys+=count($alloc_noty);
//                             }
//                             //TODO
//                             //I also need all pending aprovals in my region raised by AREA or HUB2 managers
//                             /* $query=mysqli_query($connection,"select assets_store_id from tbl_assets_store
//                            where operation=2 and approved=0 and store_id IN (select branch_id from tbl_branches where region_id='$noty_region_id' and type_id=3 or type_id=4) and action_by!='$id' and action_by IN (select staff_id from tbl_staff where mgr=1)
//                            ") or trigger_error("Query Failed! SQL: - Error: ". mysqli_error($connection), E_USER_ERROR);
//                            if(mysqli_num_rows($query)>0)
//                                 {
//                                    while($row=mysqli_fetch_assoc($query))
//                                    {
//                                        $alloc_noty[]=$row[ASSETS_STORE_ID];
//                                    }
//
//                                        $noty_avail="";
//                                        $total_notys+=count($alloc_noty);
//                                 }*/
//                             break;
//
//                     }
//                  }
                            

                ##### DEALLOCATION APPROVAL CHECKING #######
                //only God-Eyes and Managers of branches(except regular types) can approve deallocation operations             
                 //If current staff is GodEye, display all pending deallocation  approval requests
                //else if manager, check if there's a pending request in your branch(of course not made by you)
                //Area Office Managers will check ...
                //Regional Office Managers will check..
                //Head Office Manager
                            
//                  if($noty_god_eye)
//                  {
//                    //select all pending deallocation approval requests
//
//                      if(App\Asset_Store::select('assets_store_id as id')->where(OPERATION,3)->where(APPROVED,0)->exists())
//                      {
//                          $res= App\Asset_Store::select('assets_store_id as id')->where(OPERATION,3)->where(APPROVED,0)->get();
//                          foreach($res as $r)
//                          {
//                              $dealloc_noty[] = $r -> id;
//                          }
//                          $noty_avail="";
//                          $total_notys+=count($dealloc_noty);
//                      }
//
//
//                 }
//                  else if($noty_mgr)
//                  {
//                   //Which Manager are you?
//                     switch($noty_my_branch_type_id)
//                     {
//                         case "0": // HEAD OFFICE MANAGER
//                           // I need all pending approvals in my branch not raised by me
//                             if(App\Asset_Store::select('assets_store_id as id')->where(OPERATION,3)->where(APPROVED,0)
//                                 ->where('store_id',$noty_my_branch_id)->where('action_by','!=',$id)->exists())
//                             {
//                                 $res= App\Asset_Store::select('assets_store_id as id')->where(OPERATION,3)->where(APPROVED,0)
//                                     ->where('store_id',$noty_my_branch_id)->where('action_by','!=',$id)->get();
//                                 foreach($res as $r)
//                                 {
//                                     $dealloc_noty[] = $r -> id;
//                                 }
//                                 $noty_avail="";
//                                 $total_notys+=count($dealloc_noty);
//                             }
//                             break;
//
//                         case "2": // HUB1  MANAGER
//                             // I need all pending approvals in my branch not raised by me
//                             if(App\Asset_Store::select('assets_store_id as id')->where(OPERATION,3)->where(APPROVED,0)
//                                 ->where('store_id',$noty_my_branch_id)->where('action_by','!=',$id)->exists())
//                             {
//                                 $res= App\Asset_Store::select('assets_store_id as id')->where(OPERATION,3)->where(APPROVED,0)
//                                     ->where('store_id',$noty_my_branch_id)->where('action_by','!=',$id)->get();
//                                 foreach($res as $r)
//                                 {
//                                     $dealloc_noty[] = $r -> id;
//                                 }
//                                 $noty_avail="";
//                                 $total_notys+=count($dealloc_noty);
//                             }
//
//                             break;
//
//
//                         case "3":  // HUB2 MANAGER
//                             // I need all pending approvals in my branch not raised by me
//                             if(App\Asset_Store::select('assets_store_id as id')->where(OPERATION,3)->where(APPROVED,0)
//                                 ->where('store_id',$noty_my_branch_id)->where('action_by','!=',$id)->exists())
//                             {
//                                 $res= App\Asset_Store::select('assets_store_id as id')->where(OPERATION,3)->where(APPROVED,0)
//                                     ->where('store_id',$noty_my_branch_id)->where('action_by','!=',$id)->get();
//                                 foreach($res as $r)
//                                 {
//                                     $dealloc_noty[] = $r -> id;
//                                 }
//                                 $noty_avail="";
//                                 $total_notys+=count($dealloc_noty);
//                             }
//
//                             break;
//
//                         case "4": // AREA OFFICE MANAGER
//                             // I need all pending approvals in my branch not raised by me
//                             if(App\Asset_Store::select('assets_store_id as id')->where(OPERATION,3)->where(APPROVED,0)
//                                 ->where('store_id',$noty_my_branch_id)->where('action_by','!=',$id)->exists())
//                             {
//                                 $res= App\Asset_Store::select('assets_store_id as id')->where(OPERATION,3)->where(APPROVED,0)
//                                     ->where('store_id',$noty_my_branch_id)->where('action_by','!=',$id)->get();
//                                 foreach($res as $r)
//                                 {
//                                     $dealloc_noty[] = $r -> id;
//                                 }
//                                 $noty_avail="";
//                                 $total_notys+=count($dealloc_noty);
//                             }
//                             //TODO
//                             //I also need all pending aprovals in my area raised by HUB1 Managers
//                             /* $query=mysqli_query($connection,"select assets_store_id from tbl_assets_store
//                            where operation=3 and approved=0 and store_id IN (select branch_id from tbl_branches where area_id='$noty_area_id' and type_id=2) and action_by!='$id' and action_by IN (select staff_id from tbl_staff where mgr=1)
//                            ") or trigger_error("Query Failed! SQL: - Error: ". mysqli_error($connection), E_USER_ERROR);
//                            if(mysqli_num_rows($query)>0)
//                                 {
//                                    while($row=mysqli_fetch_assoc($query))
//                                    {
//                                        $dealloc_noty[]=$row[ASSETS_STORE_ID];
//                                    }
//
//                                        $noty_avail="";
//                                        $total_notys+=count($dealloc_noty);
//                                 }*/
//                             break;
//
//                         case "5":  // REGIONAL OFFICE MANAGER
//
//                            // I need all pending approvals in my branch not raised by me
//                             if(App\Asset_Store::select('assets_store_id as id')->where(OPERATION,3)->where(APPROVED,0)
//                                 ->where('store_id',$noty_my_branch_id)->where('action_by','!=',$id)->exists())
//                             {
//                                 $res= App\Asset_Store::select('assets_store_id as id')->where(OPERATION,3)->where(APPROVED,0)
//                                     ->where('store_id',$noty_my_branch_id)->where('action_by','!=',$id)->get();
//                                 foreach($res as $r)
//                                 {
//                                     $dealloc_noty[] = $r -> id;
//                                 }
//                                 $noty_avail="";
//                                 $total_notys+=count($dealloc_noty);
//                             }
//                             //TODO
//                             //I also need all pending aprovals in my region raised by AREA or HUB2 managers
//                             /* $query=mysqli_query($connection,"select assets_store_id from tbl_assets_store
//                            where operation=3 and approved=0 and store_id IN (select branch_id from tbl_branches where region_id='$noty_region_id' and type_id=3 or type_id=4) and action_by!='$id' and action_by IN (select staff_id from tbl_staff where mgr=1)
//                            ") or trigger_error("Query Failed! SQL: - Error: ". mysqli_error($connection), E_USER_ERROR);
//                            if(mysqli_num_rows($query)>0)
//                                 {
//                                    while($row=mysqli_fetch_assoc($query))
//                                    {
//                                        $dealloc_noty[]=$row[ASSETS_STORE_ID];
//                                    }
//
//                                        $noty_avail="";
//                                        $total_notys+=count($dealloc_noty);
//                                 }*/
//                             break;
//
//                     }
//                  }
//
                            
                  ##### TRANSFER APPROVAL CHECKING #######
                //only God-Eyes and Managers of branches(except regular types) can approve deallocation operations             
                 //If current staff is GodEye, display all pending deallocation  approval requests
                //else if manager, check if there's a pending request in your branch(of course not made by you)
                //Area Office Managers will check ...
                //Regional Office Managers will check..
                //Head Office Manager
                            
//                  if($noty_god_eye)
//                  {
//                    //select all pending deallocation approval requests
//
//                      if(App\Asset_Store::select('assets_store_id as id')->where(OPERATION,4)->where(APPROVED,0)->exists())
//                      {
//                          $res= App\Asset_Store::select('assets_store_id as id')->where(OPERATION,4)->where(APPROVED,0)->get();
//                          foreach($res as $r)
//                          {
//                              $transfer_noty[] = $r -> id;
//                          }
//                          $noty_avail="";
//                          $total_notys+=count($transfer_noty);
//                      }
//
//
//                 }
//                  else if($noty_mgr)
//                  {
//
//                      if(App\Asset_Store::select('assets_store_id as id')->where(OPERATION,4)->where(APPROVED,0)
//                          ->where('store_id',$noty_my_branch_id)->exists())
//                      {
//                          $res= App\Asset_Store::select('assets_store_id as id')->where(OPERATION,4)->where(APPROVED,0)
//                              ->where('store_id',$noty_my_branch_id)->get();
//                          foreach($res as $r)
//                          {
//                              $transfer_noty[] = $r -> id;
//                          }
//                          $noty_avail="";
//                          $total_notys+=count($transfer_noty);
//                      }
//
//                  }


                if(isset($noty_avail))
                {
                ?>
                <li class="dropdown">
                    <a href class="dropdown-toggle" data-toggle="dropdown">
                    <i class="ti-check-box"></i> <span>NOTIFICATIONS <span class="badge badge-warning animated tada infinite"> <?php echo $total_notys ?></span></span>
                    </a>
                    <ul class="dropdown-menu dropdown-light dropdown-messages dropdown-large">
                        <li>
                            <span class="dropdown-header"> You have new notifications</span>
                        </li>
                        <li>
                            <div class="drop-down-wrapper ps-container">
                                <div class="list-group no-margin">
                                    <!--<a class="media list-group-item" href="">
                                        <img class="img-circle" alt="..." src="assets/images/avatar-1.jpg">
                                        <span class="media-body block no-margin"> Use awesome animate.css <small class="block text-grey">10 minutes ago</small> </span>
                                    </a>-->

                                    <?php
                                    if(count($pending_raised_incident_status_noty)>0)
                                    {
                                        ?>
                                        <a class="media list-group-item" href="<?php echo route('pending_raised_incident_status') ?>">
                                            <span class="media-body block no-margin"> Actions have been taken on <?php echo count($pending_raised_incident_status_noty)?>
                                               of your raised incidence(s)</span>
                                        </a>
                                        <?php
                                    }
                                    ?>

                                    <?php
                                    if(count($pending_incident_approval_required_noty)>0)
                                    {
                                        ?>
                                        <a class="media list-group-item" href="<?php echo route('incidence_action_required') ?>">
                                            <span class="media-body block no-margin"> You have  <?php echo count($pending_incident_approval_required_noty)?>
                                                incidence(s) awaiting approval </span>
                                        </a>
                                        <?php
                                    }
                                    ?>

                                    <?php
                                     if(count($stock_noty)>0)
                                     {
                                    ?>
                                    <a class="media list-group-item" href="stock_approve.php">
                                        <span class="media-body block no-margin"> You have  <?php echo count($stock_noty)?> asset stocking approval request(s) </span>
                                    </a>
                                    <?php
                                        }
                                     ?>

                                    <?php
                                     if(count($alloc_noty)>0)
                                     {
                                    ?>
                                    <a class="media list-group-item" href="alloc_approve.php">
                                        <span class="media-body block no-margin"> You have  <?php echo count($alloc_noty) ?> asset allocation approval request(s) </span>
                                    </a>
                                    <?php
                                        }
                                     ?>

                                     <?php
                                     if(count($dealloc_noty)>0)
                                     {
                                    ?>
                                    <a class="media list-group-item" href="dealloc_approve.php">
                                        <span class="media-body block no-margin"> You have  <?php echo count($dealloc_noty) ?> asset deallocation approval request(s) </span>
                                    </a>
                                    <?php
                                        }
                                     ?>

                                     <?php
                                     if(count($transfer_noty)>0)
                                     {
                                    ?>
                                    <a class="media list-group-item" href="transfer_approve.php">
                                        <span class="media-body block no-margin"> You have  <?php echo count($transfer_noty) ?> asset transfer approval request(s) </span>
                                    </a>
                                    <?php
                                        }
                                     ?>

                                </div>
                            </div>
                        </li>

                    </ul>
                </li>
                <?php
                }
                ?>
                 <!-- end: NOTIFICATION DROPDOWN -->

							

							
							<!-- start: USER OPTIONS DROPDOWN -->
							<li class="dropdown current-user" >
								<a href class="dropdown-toggle" data-toggle="dropdown">
									<img src='<?php echo asset("storage/staff_pics/".$staff_pic) ?>'> <span class="username"><?php echo $staff_f." ".$staff_l ?> <i class="ti-angle-down"></i></span><br/>
								</a>
								<ul class="dropdown-menu dropdown-dark" style="text-align: center !important">
                                    
                                    <li>
                                        <a href="#"><i class="ti-user"></i> <strong>ROLE</strong> <br/>	<?php //echo $staff_role_name_ini ?> 	</a>
									</li>
                                    
                                    <li>
                                        <a href="#"><i class="ti-time"></i> <strong>LAST LOGIN</strong> <br/> 	<?php echo "LAST LOGIN HERE" ?>	</a>
									</li>
                                    
									<li>
										<a href="my_profile.php">
											My Profile
										</a>
									</li>
									<li>
										<a href="#">
											My Payslip
										</a>
									</li>
								
									<li>
                                        <a class="dropdown-item" href="#"
                                           onclick="event.preventDefault();
										 document.getElementById('logout-form').submit();">
                                           Log Out
                                        </a>

                                        <form id="logout-form" action="<?php echo route('logout') ?>" method="POST" style="display: none;">
                                            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>" />
                                        </form>

									</li>
								</ul>
							</li>
							<!-- end: USER OPTIONS DROPDOWN -->
						</ul>
						<!-- start: MENU TOGGLER FOR MOBILE DEVICES -->
						<div class="close-handle visible-xs-block menu-toggler" data-toggle="collapse" href=".navbar-collapse">
							<div class="arrow-left"></div>
							<div class="arrow-right"></div>
						</div>
						<!-- end: MENU TOGGLER FOR MOBILE DEVICES -->
					</div>
					<!--<a class="dropdown-off-sidebar sidebar-mobile-toggler hidden-md hidden-lg" data-toggle-class="app-offsidebar-open" data-toggle-target="#app" data-toggle-click-outside="#off-sidebar">
						&nbsp;
					</a>-->
					<!--<a class="dropdown-off-sidebar hidden-sm hidden-xs" data-toggle-class="app-offsidebar-open" data-toggle-target="#app" data-toggle-click-outside="#off-sidebar">
						&nbsp;
					</a>-->
					<!-- end: NAVBAR COLLAPSE -->
				</header>