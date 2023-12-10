<link href="<?php echo $this->config->item('base_url');?>assets/datepicker/css/datepicker.css" rel="stylesheet">    
<link href="<?php echo $this->config->item('base_url');?>assets/datepicker/less/datepicker.less" property="stylesheet" rel="stylesheet" media="screen"> 

        <script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/plugins/ckeditor/ckeditor.js"></script>

<div class="static-content">
	<div class="page-content">
		<ol class="breadcrumb">
			<li><a href="<?php echo $this->config->item('admin_url')."dashboard"; ?>">Dashboard</a></li>
			<li><?php echo $page_title; ?></li>
		</ol>

		<div class="page-heading">
			<h1><?php echo $page_title; ?></h1>
		</div>

		<div class="container-fluid">
			<div data-widget-group="group1">
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default" data-widget='{"draggable": "false"}'>
							<?php echo form_open_multipart($action); ?>
								<div class="panel-body">
									<div class="row">
										<div class="col-xs-12">
											<br/><?php echo $this->messages->msg_box();?> <br/><br/>
										</div>
									</div>

									<div class="row">
										<div class="col-xs-6">
											<div class="form-group">
												<label for="focusinput" class="control-label">Old Password</label>
												<input class="form-control" type="hidden" name="id" value="<?php echo $id;?>">
												<input type="password" name="opassword" class="form-control validate[required]" id="opassword">
											</div>
										</div> 
									</div>

									<div class="row">
										<div class="col-xs-6">
											<div class="form-group">
												<label for="focusinput" class="control-label">New Password</label>
												<input class="form-control" type="hidden" name="id" value="<?php echo $id;?>">
												<input type="password" name="password" id="password" class="form-control validate[required]">
											</div>
										</div> 
									</div>

									<div class="row">
										<div class="col-xs-6">
											<div class="form-group">
												<label for="focusinput" class="control-label">Confirm Password</label>
												<input class="form-control" type="hidden" name="id" value="<?php echo $id;?>">
												<input type="password" name="newpass" id="newpass" class="form-control validate[required,equals[password]]">
											</div>
										</div> 
									</div>


								<div class="panel-footer">
									<div class="row">
										<div class="col-lg-8">
											<button type="submit" class="btn-success btn">Submit</button>
											<button class="btn-default btn" id="cancel_btn">Cancel</button>
										</div>
									</div>
								</div>
							<?php echo form_close(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
