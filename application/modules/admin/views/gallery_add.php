<script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/plugins/ckeditor/ckeditor.js"></script>

<div class="static-content">
	<div class="page-content">
		<ol class="breadcrumb">
			<li><a href="<?php echo $this->config->item('admin_url')."dashboard"; ?>">Dashboard</a></li>
			<li><a href="<?php echo $this->config->item('admin_url')."gallery"; ?>">Gallery</a></li>
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
												<label for="focusinput" class="control-label">Category</label>
												<input class="form-control" type="hidden" name="id" value="<?php echo $id;?>">
												<input type="text" name="category" class="form-control validate[required,minSize[2],maxSize[50]]" value="<?php echo $category;?>">
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