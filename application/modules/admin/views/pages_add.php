<script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/plugins/ckeditor/ckeditor.js"></script>

<div class="static-content">
	<div class="page-content">
		<ol class="breadcrumb">
			<li><a href="<?php echo $this->config->item('admin_url')."dashboard"; ?>">Dashboard</a></li>
			<li><a href="<?php echo $this->config->item('admin_url')."pages"; ?>">Pages</a></li>
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
												<label for="selector1" class="control-label">Page Name</label>
												<input class="form-control" type="hidden" name="id" value="<?php echo $id;?>">
												<input type="text" class="form-control validate[required,minSize[2],maxSize[50]]" name="page_name" value="<?php echo $page_name;?>">
											</div>
										</div>
										<div class="col-xs-6">
											<div class="form-group">
												<label for="selector1" class="control-label">URL</label>
												<input type="text" class="form-control validate[required,minSize[2]]" name="url" value="<?php echo $url;?>">
											</div>
										</div>
									</div>
									<div class="row">										
										<div class="col-xs-12">
											<div class="form-group">
												<label for="focusinput" class="control-label">Description</label>
												<textarea class="form-control ckeditor validate[required,minSize[2],maxSize[200]]" name="description"><?php echo $description; ?></textarea>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<div class="form-group">
												<label for="selector1" class="control-label">Banner Image (1920 X 522)</label>
												<input type="file" name="banner_image" ><?php if($banner_image) { ?>
													<img src="<?php echo $this->config->item("base_url")."uploads/pages/banner_small/".$banner_image; ?>">
													<?php } ?>
											</div>
										</div> 
									</div>
									<div class="row">
										<div class="col-xs-6">
											<div class="form-group">
												<label for="selector1" class="control-label">Meta Keyword</label>
												<input type="text" value="<?php echo $meta_keyword; ?>" name="meta_keyword" class="form-control validate[required,minSize[2],maxSize[60]]">
											</div>
										</div>
										<div class="col-xs-6">
											<div class="form-group">
												<label for="focusinput" class="control-label">Meta Title</label>
												<input type="text" class="form-control validate[required,minSize[2]]" name="meta_title" value="<?php echo $meta_title; ?>">
											</div>
										</div>
									</div>

									<div class="row">
										 
										<div class="col-xs-12">
											<div class="form-group">
												<label for="focusinput" class="control-label">Meta Description</label>
												<textarea class="form-control validate[required,minSize[2],maxSize[150]]" name="meta_description"><?php echo $meta_description; ?></textarea>
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