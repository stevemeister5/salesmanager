<?php
use Carbon\Carbon;
$now= Carbon::now('Africa/Lagos');
?>

<!-- start: USER PROFILE -->
@foreach($staff_collection as $val)
 <div class="container-fluid container-fullw bg-white">
				<div class="row">
					<div class="col-md-12">

					<div id="panel_overview" class="tab-pane">
						<div class="row">
							<div class="col-sm-6 col-md-5">
								<div class="user-left">
									<div class="center">
										
										<div class="fileinput fileinput-new" data-provides="fileinput">
											<div class="user-image">
												<div class="fileinput-new thumbnail"><img width="100px" height="100px" src="{{ asset("storage/staff_pics/".$val->pics) }}" alt="">
												</div>	
												<h4>{{ strtoupper($val->first_name." ".$val->middle_name." ".$val->last_name) }}</h4>
											</div>
										</div>
										<hr>
									</div>
									<!-- Contact Information -->
									<table class="table table-condensed">
										<thead>
											<tr>
												<th style="color:#F63 !important; font-weight:700" colspan="3"><i class="fa fa-book"></i>&nbsp;CONTACT INFORMATION</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Residential Address:</td>
												<td>{{ $val->residential_address }}</td>
												
											</tr>
											<tr>
												<td>Home Address:</td>
												<td>{{ $val->hometown_address }}</td>
												
											</tr>
											<tr>
												<td>Phone:</td>
												<td>{{ $val->phone }}</td>
												
											</tr>
											<tr>
												<td>Email:</td>
												<td> {{ $val->email }} </td>
												
											</tr>
										</tbody>
									</table>
									<!-- /Contact Information -->
									
									<!-- Additional Information -->
									<table class="table">
										<thead>
											<tr>
												<th style="color:#F63 !important; font-weight:700" colspan="3"><i class="fa fa-plus"></i>&nbsp;ADDITIONAL INFORMATION</th>
											</tr>
										</thead>
										<tbody>
											
									  <tr>
											<td>Birthday</td>
											<td>
											 <?php

												$dob = new Carbon($val->dob);
												echo $dob->format('jS F , Y');
												echo " | ".$now->diffInYears($dob)." years";

											  ?>

											</td>
									  </tr>

										<tr>
											<td>Gender</td>
											<td><?php 
												switch($val->gender)
												{
													case 0:
														echo "Female";
														break;
													case 1:
														echo "Male";
														break;
												}
												 ?>
											</td>
										</tr>

										<tr>
											<td>Marital Status</td>
											<td><?php 
												switch($val->m_status)
												{
													case 0:
														echo "Single";
														break;
													case 1:
														echo "Married";
														break;
													case 2:
														echo "Divorced";
														break;
												}
												 ?>
											</td>
										</tr>

										@if($val->m_status==1)
										 <tr>
											<td>Spouse Name</td>
											<td>{{ $val->spouse_name }}</td>
										 </tr>

										<tr>
											<td>Spouse Phone</td>
											<td>{{ $val->spouse_phone }}</td>
										 </tr>

										@endif

										<tr>
											<td>State of Origin</td>
											<td>{{ $val->state_name }}</td>
										</tr>

										<tr>
											<td>LGA</td>
											<td>{{ $val->lga_name }}</td>
										</tr>

										</tbody>
									</table>
									<!-- /Additional Information -->
									
									 @if(!$guarantors_collection->isEmpty())
									<div style="overflow-x: auto">
									 <table class="table">
										<thead>
											<tr>
												<th style="color:#F63 !important; font-weight:700" colspan="3"><i class="fa fa-thumbs-o-up "></i>&nbsp;GUARANTOR DETAILS</th>
											</tr>
											<tr>
											<th>S/N</th>
											<th>Name</th>
											<th>Phone</th>
											<th>Email</th>
											<th>Office Address</th>
											<th>Home Address</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$q=0;
											foreach($guarantors_collection as $value )
											{
											    $q++;
											?>
												<tr>
													<td><?php echo $q;?></td>
													<td><?php echo $value->g_name ?></td>
													<td><?php echo $value->g_phone ?></td>
													<td><?php echo $value->g_email ?></td>
													<td><?php echo $value->g_office_address ?></td>
													<td><?php echo $value->g_home_address ?></td>

												</tr>
											<?php
											}
											?>
										</tbody>
									 </table>
									 </div>
									 @endif
														
									
									<table class="table">
										<thead>
											<tr>
												<th style="color:#F63 !important; font-weight:700" colspan="3"><i class="fa fa-ambulance"></i>&nbsp;EMERGENCY CONTACT</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Name</td>
												<td>{{ $val->ec_name }}</td>
												
											</tr>
											<tr>
												<td>Phone Number</td>
												<td>{{ $val->ec_phone }}</td>
												
											</tr>
											
											<tr>
												<td>Address</td>
												<td>{{ $val->ec_address }}</td>
												
											</tr>
											
										</tbody>
									</table>
									
									
									<table class="table">
										<thead>
											<tr>
												<th style="color:#F63 !important; font-weight:700" colspan="3"><i class="fa fa-street-view "></i>&nbsp;NEXT OF KIN INFO</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Name</td>
												<td>{{ $val->nok_name }}</td>
												
											</tr>
											
											
											<tr>
												<td>Relationship</td>
												<td>{{ $val->nok_type_name }}</td>
												
											</tr>
											
											<tr>
												<td>Phone Number</td>
												<td>{{ $val->nok_phone }}</td>
												
											</tr>
											
											<tr>
												<td>Address</td>
												<td>{{ $val->nok_address }}</td>
												
											</tr>
											
										</tbody>
									</table>
									
										
									
								</div>
							</div>
							<div class="col-sm-6 col-md-7">
								
								
								<table class="table table-condensed table-hover">

									<tbody>
									   <tr>
											<td style="color:#F63 !important; font-weight:700"><i class="fa fa-gear"></i>&nbsp;JOB DETAILS</td>
											<td></td>

									   </tr>

										<tr>
											<td>Status</td>
											<td>{{ $val->status_name }}</td>

										</tr>
										
										<tr>
											<td>Staff Number</td>
											<td>{{ $val->staff_no }}</td>

										</tr>

										 <tr>
											<td>Branch</td>
											<td>{{$val->branch_name}}
											</td>
										</tr>


									 <tr>
											<td>Branch Address</td>
											<td>{{ $val->branch_address }}</td>
										</tr>


										<tr>
											<td>Branch Type</td>
											<td>{{ $val->type_name}}</td>
										</tr>

									   <tr>
											<td>Branch Region</td>
											<td>
												@if($val->region_name!="" || !is_null($val->region_name))
														{{ $val->region_name }}
													@else
														{{-- '[Nil]' --}}
													@endif
										   </td>
										</tr>

									   <tr>
											<td>Branch Area</td>
											<td> 				
													@if($val->area_name!="" || !is_null($val->area_name))
													   {{ $val->area_name }}
													@else
													   {{-- '[Nil]' --}}
													@endif
										   </td>
										</tr>


									   <tr>
											<td>Role</td>
											<td>{{ $val->role_name }}</td>
										</tr>


									   <tr>
											<td>Level</td>
											<td>{{ $val->level_code }}</td>
										</tr>
										
										 <tr>
											<td>Resumption Type</td>
											<td>{{ $val->rtn." (".$val->rtst." - ".$val->rtet." )" }}</td>
										</tr>

										<tr>
											<td>View Scope</td>
											<td>
												<span class="label 
													label-<?php
														if($val->god_eye)
														echo 'default';
														elseif($val->gm)
															echo 'success'; 
														elseif($val->mgr)
															echo 'warning' ;
														elseif($val->area_sup)
															echo 'danger' ;
														else
															echo 'info' ;
														?>
													">

														@if($val->god_eye)
															{{ 'Managing Director' }}
														@elseif($val->gm)
															{{ 'General Manager' }}
														@elseif($val->mgr)
															{{ $val->type_name.' Manager' }}
														@elseif($val->area_sup)
															{{ 'Area Supervisor' }}
														@else
															{{ 'Regular View' }}
														@endif
												   </span>
											</td>
										</tr>

									    <tr>
											<td>Department</td>
											<td>{{ $val->dept_name==""?"NIL":$val->dept_name }}</td>
										</tr>

									   @if($val->dept_name!="")
									   <tr>
										   <td>Department Role</td>
										   <td>{{ $val->dept_hod==0?"Member":"Head of Department" }}</td>
									   </tr>
									   @endif

										 <tr>
											<td>Unit</td>
											<td>{{ $val->unit_name==""?"NIL":$val->unit_name }}</td>
										</tr>


										<tr>
											<td>Resumption Date</td>
											<td> 
											<?php 
												$resume_date = new Carbon($val->resumption_date);
												$years=$now->diffInYears($resume_date);
												$months=$now->diffInMonths($resume_date);	
												if($years>0)
												{
													$months-=($years * 12);
												}
												echo $resume_date->format('jS F , Y')." | ".$years." years , ".$months." months ago!"
											?></td>
										</tr>
										
										<tr>
											<td>Assumption Date</td>
											<td>
												@if($val->assumption_date!="")
											<?php 
												$assume_date = new Carbon($val->assumption_date);
												$years=$now->diffInYears($assume_date);
												$months=$now->diffInMonths($assume_date);	
												if($years>0)
												{
													$months-=($years * 12);
												}
												echo $assume_date->format('jS F , Y')." | ".$years." years , ".$months." months ago!"
											?>  @else
												{{"NIL"}}
												@endif
											</td>
										</tr>
										
										<tr>
											<td>Termination Date</td>
											<td>{{ $val->termination_date }}</td>
										</tr>
										
										
										  <tr>
											<td style="color:#F63 !important; font-weight:700"><i class="fa fa-credit-card"></i>&nbsp;ACCOUNT DETAILS</td>
											<td></td>

									      </tr>
										
										
										 <tr>
											<td> Bank Name</td>
											<td> {{ $val->bank_name  }}	</td>
									     </tr>
										
									      <tr>
											<td> Account Name</td>
											<td> {{ $val->account_name  }}	</td>
									     </tr>
										
										<tr>
											<td> Account Name</td>
											<td> {{ $val->account_no  }}	</td>
									     </tr>
										
										<tr>
											<td> Account Type</td>
											<td> 
												  @if($val->account_type==1  )
											      {{ "Savings"  }}
												  @else 
												  {{ "Current"  }}
												  @endif
											</td>
									     </tr>
										



									  
									    @if(!$docs_collection->isEmpty())
												
										 <table class="table">
											<thead>
												<tr>
											<td style="color:#F63 !important; font-weight:700"><i class="fa fa-file-text"></i>&nbsp;DOCUMENTS</td>
											<td></td>

									            </tr>
												<tr>
													<th>S/N</th>
													<th>Document</th>
													<th>Document Type</th>

												</tr>
											   </thead>
											   <tbody>
												<?php
												$q=0;
												foreach($docs_collection as $value )
												{
													$q++;
												?>
													<tr>
														<td><?php echo $q;?></td>
														<td><a class="btn btn-squared" target="_blank" href='{{ asset("storage/staff_docs/".$value->docs_name) }}'>
															<?php echo $value->docs_name ?>
															</a>
														</td>
														<td><?php echo $value->docs_type ?></td>

													</tr>
												<?php
												}
												?>
											</tbody>
										 </table>

										 @endif


									</tbody>
								   </table>
								
								
								
								 
									    @if(!$education_collection->isEmpty())
										<div style="overflow-x: auto">
										 <table class="table">
											
											<thead>
											<tr>
											<td style="color:#F63 !important; font-weight:700"><i class="fa fa-institution"></i>EDUCATION</td>
											<td></td>
											<td></td>
									         </tr>
												<tr>
													<th>S/N</th>
													<th>Education Type</th>
													<th>Start Year</th>
													<th>End Year</th>
													<th>Institution</th>
													<th>Course</th>
													<th>Qualification</th>
													<th>Class</th>

												</tr>
											</thead>
											<tbody>
												<?php
												$q=0;
												foreach($education_collection as $value )
												{
													$q++;
												?>
													<tr>
														<td><?php echo $q;?></td>
														<td><?php echo $value->etn ?></td>
														<td><?php echo $value->start_year ?></td>
														<td><?php echo $value->end_year ?></td>
														<td><?php echo $value->institution_name ?></td>
														<td><?php echo $value->course_name ?></td>
														<td><?php echo $value->eqn ?></td>
														<td><?php echo $value->ecn ?></td>

													</tr>
												<?php
												}
												?>
											</tbody>
										 </table>
							        	</div>
										 @endif
								
								<br/>
									<?php
									$arr=["","success","danger","info","warning"];
									 ?>
								@if(!$work_collection->isEmpty())
								<div class="panel panel-white" id="activities">
									<div class="panel-heading border-light">
										<h4 style="color:#F63 !important; font-weight:700"><i class="fa fa-suitcase "></i> WORK EXPERIENCE</h4>
										<paneltool class="panel-tools" tool-collapse="tool-collapse" tool-refresh="load1" tool-dismiss="tool-dismiss"></paneltool>
									</div>
									<div collapse="activities" ng-init="activities=false" class="panel-wrapper">
										<div class="panel-body">
											<ul class="timeline-xs">
												
												@foreach($work_collection as $val)
												<li class="timeline-item <?php echo $arr[rand(0,4)] ?>">
													<div class="margin-left-15">
														<div class="text-small">
															<strong>{{ $val->work_start_year." - ".$val->work_end_year }}</strong>
														</div>
														<p>
															{!! "<span class='text-success'><i class='fa fa-building-o'></i> COMPANY : ".strtoupper($val->establishment_name)."</span>" !!}
															
														</p>
														<p>
														 {!! "<span class='text-danger'><i class='fa fa-bookmark'></i> JOB TITLE : ".strtoupper($val->position_held)."</span>" !!}
															
														</p>
														<p>
															<span style="border-bottom: thin #02EF44 solid">JOB FUNCTIONS</span><br/>
														{{ $val->job_functions }}
														</p>
													</div>
												</li>
												@endforeach
												
			
											</ul>
										</div>
									</div>
								</div>
								@endif
								
								
								
								
								
							</div>
						</div>
					</div>

					</div>
				</div>
</div>
@endforeach
<!-- end: USER PROFILE -->