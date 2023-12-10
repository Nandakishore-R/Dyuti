<script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/plugins/ckeditor/ckeditor.js"></script>

<div class="static-content">
	<div class="page-content">
		<ol class="breadcrumb">
			<li><a href="<?php echo $this->config->item('admin_url')."dashboard"; ?>">Dashboard</a></li>
			<li><a href="<?php echo $this->config->item('admin_url')."flayer"; ?>">Flayer</a></li>
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
										<div class="col-xs-6">
											<div class="form-group">
												<label for="selector1" class="control-label ">Category</label>
												<?php echo $cat_dd; ?>
											</div>
										</div>
										<div class="col-xs-6">
											<div class="form-group">
												<label for="focusinput" class="control-label">Flayer Name</label>
												<input class="form-control" type="hidden" name="id" value="<?php echo $id;?>">
												<input type="text" name="title" class="form-control validate[required,minSize[2],maxSize[50]]" value="<?php echo $title;?>">
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-xs-8">
											<div class="form-group">
												<label for="selector1" class="control-label">Description</label>
												<textarea class="form-control ckeditor" name="description"><?php echo $description; ?></textarea>
											</div>
										</div>
									</div>

									<?php
							        	if($this->uri->segment(3)=="add")
							        		$clas   =   'required="required"';
							       		else
							       			$clas = '';
							       ?>

									<div class="row">
										<div class="col-xs-6">
											<div class="form-group">
												<label for="selector1" class="control-label">Image</label>
												<input type="file" class="vallidate[required]" name="image" <?php echo $clas; ?>><?php echo $image; ?>
											</div>
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