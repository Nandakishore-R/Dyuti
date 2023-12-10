<!DOCTYPE html>
<html lang="en" class="coming-soon">

<!-- /1.2/extras-forgotpassword.html /3.x [XR&CO'2014], Fri, 29 Jan 2016 06:05:00 GMT -->
<head>
    <meta charset="utf-8">
    <title>Eshoppy Admin</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="author" content="KaijuThemes">

    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600' rel='stylesheet' type='text/css'>
    <link type="text/css" href="<?php echo $this->config->item('base_url');?>assets/admin/plugins/iCheck/skins/minimal/blue.css" rel="stylesheet">
    <link type="text/css" href="<?php echo $this->config->item('base_url');?>assets/admin/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link type="text/css" href="<?php echo $this->config->item('base_url');?>assets/admin/fonts/themify-icons/themify-icons.css" rel="stylesheet">               <!-- Themify Icons -->
    <link type="text/css" href="<?php echo $this->config->item('base_url');?>assets/admin/css/styles.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries. Placeholdr.js enables the placeholder attribute -->
    <!--[if lt IE 9]>
        <link type="text/css" href="assets/css/ie8.css" rel="stylesheet">
        <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The following CSS are included as plugins and can be removed if unused-->
    </head>

    <body class="focused-form">
                
<div class="container" id="forgotpassword-form">
	<a href="index-2.html" class="login-logo"><img src="<?php echo $this->config->item('base_url');?>assets/admin/img/logo-big.png"></a>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>Login Form</h2>
				</div>
				<?php echo form_open($action,array("class"=>"form-horizontal")); ?>
				<div class="panel-body">
				<?php if ($this->messages->msg_box()) {
					echo "<div class='alert alert-warning'>".$this->messages->msg_box()."</div>";
							} ?>
						<div class="form-group mb-n">
	                        <div class="col-xs-12">
	                        	<p>Enter your registered email to reset your password</p>
	                        	<div class="input-group">							
									<span class="input-group-addon">
										<i class="ti ti-user"></i>
									</span>
									<input name="user_email" required="" type="email" class="form-control validate[required]" placeholder="Email Address">
								</div>
	                        </div>
						</div>
				</div>
				<div class="panel-footer">
					<div class="clearfix">
						<button class="btn-default btn" id="cancel_btn">Go Back</button>
						<button type="submit" class="btn-success btn pull-right">Submit</button>
					</div>
				</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>

    
    
    <!-- Load site level scripts -->

<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script> -->

<script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/js/jquery-1.10.2.min.js"></script> 
<script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/js/settings.js"></script> 							<!-- Load jQuery -->
<script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/js/jqueryui-1.10.3.min.js"></script> 							<!-- Load jQueryUI -->
<script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/js/bootstrap.min.js"></script> 								<!-- Load Bootstrap -->
<script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/js/enquire.min.js"></script> 									<!-- Load Enquire -->

<script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/plugins/velocityjs/velocity.min.js"></script>					<!-- Load Velocity for Animated Content -->
<script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/plugins/velocityjs/velocity.ui.min.js"></script>

<script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/plugins/wijets/wijets.js"></script>     						<!-- Wijet -->

<script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/plugins/codeprettifier/prettify.js"></script> 				<!-- Code Prettifier  -->
<script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/plugins/bootstrap-switch/bootstrap-switch.js"></script> 		<!-- Swith/Toggle Button -->

<script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js"></script>  <!-- Bootstrap Tabdrop -->

<script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/plugins/iCheck/icheck.min.js"></script>     					<!-- iCheck -->

<script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/plugins/nanoScroller/js/jquery.nanoscroller.min.js"></script> <!-- nano scroller -->
<script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/plugins/jquery-mousewheel/jquery.mousewheel.min.js"></script> <!-- Mousewheel support needed for Mapael -->

<script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/plugins/sparklines/jquery.sparklines.min.js"></script> 			 <!-- Sparkline -->

<script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/js/application.js"></script>
<script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/demo/demo.js"></script>
<script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/demo/demo-switcher.js"></script>

<!-- End loading site level scripts -->
    <!-- Load page level scripts-->
    
    <!-- End loading page level scripts-->
    </body>

<!-- /1.2/extras-forgotpassword.html /3.x [XR&CO'2014], Fri, 29 Jan 2016 06:05:00 GMT -->
</html>