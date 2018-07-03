<section id="page-title" class="padding-top-15 padding-bottom-15">
							<div class="row">
								<div class="col-sm-7">
									<h1 class="mainTitle animated bounce"><?php echo !isset($URL_FIRST_LEVEL_NAME)?"DASHBOARD":$URL_FIRST_LEVEL_NAME ?></h1>
									<?php
									if(isset($URL_FIRST_LEVEL_NAME))
									{
									?>
									<span class="mainDescription label label-default" style="display: inline !important; color: white !important; text-transform:uppercase !important"><?php echo $URL_SECOND_LEVEL_NAME ?> </span>
									<?php										
										if(isset($URL_THIRD_LEVEL_NAME))
										{
									?>
								 <span class="mainDescription" style="display: inline !important"><?php echo " > ".$URL_THIRD_LEVEL_NAME; ?> </span>
									
									<?php	
										}
									}else{
									echo "<span class='mainDescription'> Welcome to Sales Manager Control Panel.<br/> Use your navigation on the left maximize your User Experience</span>";
									}
									?>
								</div>
								<div class="col-sm-5">
									<!-- start: MINI STATS WITH SPARKLINE -->
									
									<!-- end: MINI STATS WITH SPARKLINE -->
								</div>
							</div>
						</section>