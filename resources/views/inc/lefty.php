
                       <ul class="main-navigation-menu hidden-print">

							<li class="<?php if( Route::current()->getName()=='dashboard') echo "active open" ?>">
								<a href="<?php echo route('dashboard') ?>">
									<div class="item-content">
										<div class="item-media">
											<i class="ti-dashboard"></i>
										</div>
										<div class="item-inner">
											<span class="title"> Dashboard </span>
										</div>
									</div>
								</a>
							</li>

						<?php
						for($a=0;$a<count($main_tab_id);$a++)
						 {
					    ?>

							<li class="<?php
							 if(isset($URL_FIRST_LEVEL_ID))
							 {
							 if($main_tab_id[$a]==$URL_FIRST_LEVEL_ID)
							 echo "active open";
							 }
									   ?>">
								<a title="<?php echo $main_tab_name[$a] ?>" href="javascript:void(0)">
									<div class="item-content">
										<div class="item-media">
											<i class="ti-<?php echo $main_tab_icons[$a] ?> "></i>
										</div>
										<div class="item-inner">
											<span class="title"> <?php echo $main_tab_name[$a] ?> </span>
											<i class="icon-arrow"></i>
										</div>
									</div>
								</a>
								<ul class="sub-menu">

								<?php
								for($b=0;$b<count($sub_tab_id);$b++)
								 {

									 if($main_sub_tab_id[$b]==$main_tab_id[$a])
									 {
								?>

									<li><a title="<?php echo $sub_tab_name[$b] ?>" href="<?php
                                       if( $sub_tab_named_route[$b]!="" or is_null($sub_tab_named_route[$b]) )
                                           echo route($sub_tab_named_route[$b]);
                                       else
										  echo "#";
                                       ?>">
											<span><?php echo $sub_tab_name[$b] ?>  </span>

											<?php
											if($sub_tab_url[$b]=="#")
											{
											?>
											<i class="icon-arrow"></i>
											<?php
											}
											?>

										</a>
										<?php
											if($sub_tab_url[$b]=="#")
											{
											?>
										<ul class="sub-menu">
										<?php
											for($c=0;$c<count($suber_tab_id);$c++)
								             {
												 if($suber_tab_sub_id[$c]==$sub_tab_id[$b])
											     {
										?>
											<li>
												<a title="<?php echo $suber_tab_name[$c]; ?>" href="<?php
												 if($suber_tab_named_route[$c]!="" or is_null($suber_tab_named_route[$c]))
												 echo route($suber_tab_named_route[$c]);
												 else
												 echo "#";
											  ?>">
													<?php
													echo $suber_tab_name[$c];
													?>
												</a>
											</li>
											<?php
											  }
											 }
												?>
										</ul>
										<?php
											}
										?>
									</li>

									<?php
									 }
								     }
									?>
								</ul>
							</li>

						<?php
					      }
						 ?>
						</ul>

