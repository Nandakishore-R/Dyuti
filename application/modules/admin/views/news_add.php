<link href="<?php echo $this->config->item('base_url');?>assets/datepicker/css/datepicker.css" rel="stylesheet">    
<link href="<?php echo $this->config->item('base_url');?>assets/datepicker/less/datepicker.less" property="stylesheet" rel="stylesheet" media="screen"> 

        <script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/admin/plugins/ckeditor/ckeditor.js"></script>

<div class="static-content">
	<div class="page-content">
		<ol class="breadcrumb">
			<li><a href="<?php echo $this->config->item('admin_url')."dashboard"; ?>">Dashboard</a></li>
			<li><a href="<?php echo $this->config->item('admin_url')."news"; ?>">News</a></li>
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
												<label for="focusinput" class="control-label">Title</label>
												<input class="form-control" type="hidden" name="id" value="<?php echo $id;?>">
												<input type="text" name="title" class="form-control validate[required,minSize[2],maxSize[50]]" value="<?php echo $title;?>">
											</div>
										</div>
										<div class="col-xs-6">
											<div class="form-group">
												<label for="selector1" class="control-label">Published By</label>
												<input type="text" class="form-control validate[required,minSize[2],maxSize[200]]" name="published_by" value="<?php echo $published_by; ?>">
											</div>
										</div>
									</div>


									<div class="row">
										<div class="col-xs-6">
											<div class="form-group">
												<label for="focusinput" class="control-label">Start Date</label>
												<input readonly="" type="text" name="sdate" class="form-control validate[required]" id="dpd1" value="<?php echo $sdate;?>">
											</div>
										</div>
										<div class="col-xs-6">
											<div class="form-group">
												<label for="selector1" class="control-label">End Date</label>
												<input readonly="" type="text" class="form-control validate[required]" id="dpd2" name="edate" value="<?php echo $edate; ?>">
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-xs-12">
											<div class="form-group">
												<label for="selector1" class="control-label">Description</label>
												<textarea class="form-control validate[required]" name="description"><?php echo $description; ?></textarea>
											</div>
										</div>
									</div>

									<div class="row">
										<?php
										    if($this->uri->segment(3)=="add")
										    $clas   =   'required="required"';
											else
											$clas	=	'';
										?>
										<div class="col-xs-6">
											<div class="form-group">
												<label for="focusinput" class="control-label">Image (484 X 318 )</label>
												<input type="file" name="image" <?php echo $clas; ?>>
												<?php if($image) { ?>
													<img src="<?php echo $this->config->item("base_url")."uploads/news/small/".$image; ?>">
													<?php } ?>
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

<script src="<?php echo $this->config->item('base_url');?>assets/datepicker/js/bootstrap-datepicker.js"></script>

<script>
 $('#dpd1').datepicker({
    format: 'yyyy-mm-dd'
 });
 $('#dpd2').datepicker({
    format: 'yyyy-mm-dd'
 });
    var nowTemp = new Date();

    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);



    var checkin = $('#dpd1').datepicker({

        onRender: function (date) {

            return date.valueOf() < now.valueOf() ? 'disabled' : '';

        }

    }).on('changeDate', function (ev) {

        if (ev.date.valueOf() > checkout.date.valueOf()) {

            var newDate = new Date(ev.date)

            newDate.setDate(newDate.getDate() + 1);

            checkout.setValue(newDate);

        }

        checkin.hide();

        $('#dpd2')[0].focus();

    }).data('datepicker');

    var checkout = $('#dpd2').datepicker({

        onRender: function (date) {

            return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';

        }

    }).on('changeDate', function (ev) {

        checkout.hide();

    }).data('datepicker');





</script>

