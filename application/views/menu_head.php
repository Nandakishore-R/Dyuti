

<!-- Nav -->
<div class="container-fluid">
	<div class="row white-back navbg">
		<section class="content-wrapper">
			<nav class="navbar navbar-default" role="navigation">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>

				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li <?php if($this->uri->segment(1)=="") {?> class="active" <?php } ?> ><a href="<?php echo $this->config->item("base_url"); ?>"> HOME </a></li>
						<li <?php if($this->uri->segment(1)=="rajagiri") {?> class="active" <?php } ?>><a href="<?php echo $this->config->item("base_url"); ?>rajagiri"> RAJAGIRI</a></li>
		                <!--<li ><a href="<?php echo $this->config->item('base_url')."pdf/"; ?>Program Schedule.pdf">PROGRAM SCHEDULE</a></li>-->
		                 <li ><a href="<?php echo $this->config->item('base_url')."assets/"; ?>images/banner1/ProgrammeSchedule.pdf">PROGRAM SCHEDULE</a></li>
						<li <?php if($this->uri->segment(1)=="call_for_papers") {?> class="active" <?php } ?>><a href="<?php echo $this->config->item("base_url"); ?>call_for_papers"> CALL FOR PAPERS</a></li>
				<!--	<li <?php //if($this->uri->segment(1)=="accomodation") {?> class="active" <?php //} ?>><a href="<?php // echo $this->config->item("base_url"); ?>accomodation"> ACCOMODATION</a></li>-->
							<!--<li <?php //if($this->uri->segment(1)=="organizers") {?> class="active" <?php// } ?>><a href="<?php //echo $this->config->item("base_url"); ?>organizers"> ORGANIZERS</a></li>-->
 						<!--<li <?php //if($this->uri->segment(1)=="programs") {?> class="active" <?php// } ?>><a target="_blank" href="<?php// echo $this->config->item('base_url')."pdf/"; ?>Final_01012020.pdf"> PROGRAMME</a></li>-->
         <li <?php if($this->uri->segment(1)=="speakers") {?> class="active" <?php } ?>><a href="<?php echo $this->config->item("base_url"); ?>speakers"> SPEAKERS</a></li>
         <!--<li ><a href="#">SPEAKERS</a></li>-->
						<li <?php if($this->uri->segment(1)=="attractions") {?> class="active" <?php } ?>><a href="<?php echo $this->config->item("base_url"); ?>attractions"> ATTRACTIONS</a></li>
						<li><a href="<?php echo base_url();?>competition/index">COMPETITION</a></li>
						<li <?php if($this->uri->segment(1)=="gallery") {?> class="active" <?php } ?>><a href="<?php echo $this->config->item("base_url"); ?>gallery"> GALLERY</a></li>
						<li <?php if($this->uri->segment(1)=="contactus") {?> class="active" <?php } ?> ><a href="<?php echo $this->config->item("base_url"); ?>contactus"> CONTACT</a></li>
					
	<li  ><a href="https://www.conference.rajagiri.edu/icmas/registration-open" target="_blank">REGISTRATION</a></li>
						<?php if(!$this->session->userdata('wlogged_in')) { ?>

					
								<?php } else { ?>
									<li class="user-head dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user fa-fw"></i> <?php echo $this->loghead->showWebUser(); ?> </a>
										<ul class="dropdown-menu usernav">
											<li><a href="<?php echo $this->config->item("base_url")."dashboard"; ?>"><i class="fa fa-user"></i> Profile </a></li>
											<li><a href="<?php echo $this->config->item("base_url")."registration/logout"; ?>"><i class="fa fa-unlock-alt fa-fw"></i> Sign Out </a></li>
										</ul>
									</li>
									<?php } ?>
								</ul>
							</div><!-- /.navbar-collapse -->
						</nav>
					</section>
				</div>
			</div>
		<!---->