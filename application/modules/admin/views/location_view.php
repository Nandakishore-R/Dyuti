<div class="static-content">
	<div class="page-content">
		<ol class="breadcrumb">
			<li><a href="<?php echo $this->config->item('admin_url')."dashboard"; ?>">Dashboard</a></li>
			<li><a href="<?php echo $this->config->item('admin_url')."programs"; ?>">Program</a></li>
			<li><?php echo $page_title; ?></li>
		</ol>

		<div class="page-heading">
			<h1><?php echo $page_title; ?></h1>
		</div>

		<div class="container-fluid">
			<div data-widget-group="group1">
				
				<div class="row">
					<div class="col-sm-12">
						<table id="example" class="table" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>Day</th>
									<th>Add Programs</th>
									<th>View Programs</th>
								</tr>
							</thead>
							<tbody id="ajax_content">
							<?php foreach ($dayslist as $key => $value) { ?>
								<tr>
									<td><?php echo $value->title; ?></td>
									<td><button data-dayid="<?php echo $value->id; ?>" type="button" class="butn-add-pgm add-pgm" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus fa-fw"></i>Add Program</button></td>
									<td><button data-dayid="<?php echo $value->id; ?>" type="button" class="butn-add-pgm view-pgm" data-toggle="modal" data-target="#myPrograms"><i class="fa fa-chevron-circle-right fa-fw"></i>View Programs</button></td>
								</tr>
							<?php } ?>
							</tbody>
						</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add Program</h4>
				</div>
				<form class="pgm_form" id="pgm_form">
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-12" id="sub_resp"> </div>
					</div>


					<div class="row">
						<div class="col-xs-6">
							<div class="form-group">
								<label for="focusinput" class="control-label">Start Time</label>
								<input class="form-control" type="hidden" name="dayid" id="dayid">
								<input class="form-control" type="hidden" name="locId" value="<?php echo $locId;?>">
								<div class="input-group bootstrap-timepicker timepicker">
        							<input id="timepicker1" name="timepicker1" class="form-control input-small validate[required]" type="text"/><span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
    							</div>
							</div>
						</div>
						<div class="col-xs-6">
							<div class="form-group">
								<label for="focusinput" class="control-label">End Time</label>
								<div class="input-group bootstrap-timepicker timepicker">
        							<input id="timepicker2" name="timepicker2" class="form-control input-small validate[required]" type="text"/><span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
    							</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-12">
							<div class="form-group">
								<label for="focusinput" class="control-label">Program Type</label>
								<div class="radio">
								  <label class="type_radio"><input value="speech" class="optradio validate[required]" type="radio" name="optradio">Speech</label>
								  <label class="type_radio"><input value="abstract" class="optradio validate[required]" type="radio" name="optradio">Abstract</label>
								  <label class="type_radio"><input value="others" class="optradio validate[required]" type="radio" name="optradio">Others</label>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-12">
							<div class="form-group">
								<label for="focusinput" class="control-label">Program Details</label>
								<div class="pdetails">
								 </div>
							</div>
						</div>
					</div>


					<div class="row">
						<div class="col-xs-12">
							<div class="form-group">
								<label for="focusinput" class="control-label">Description</label>
								<textarea class="form-control validate[required]" id="desc" name="desc"></textarea>
							</div>
						</div> 
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" id="pgm-submit">Submit</button>
				</div>
				</form>
			</div>

		</div>
	</div>

 

	<!-- Modal -->
	<div id="myPrograms" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">View Programs</h4>
				</div>
				 
				<div class="modal-body">

					<div class="row">
						<div class="col-xs-12">
							
							<table id="example" class="table" cellspacing="0" width="100%">
								<tbody id="viewlistresp">
									
								</tbody>
							</table>
						</div>
					</div>

				</div>
 
				 
			</div>

		</div>
	</div>


<script type="text/javascript">
$(document).ready(function()
{
	$(".add-pgm").click(function()
	{
		var dayid 		=	$(this).data("dayid");
		$("#dayid").val(dayid);
	});

	$(".view-pgm").click(function()
	{
		var dayid 		=	$(this).data("dayid");
		$.ajax({
				data 	: "dayid="+dayid,
				type 	: "POST",
				url 	: "<?php echo $this->config->item("admin_url")."programs/getDayPrograms"; ?>",
				success : function(resp)
				{
					$(".modal-body #viewlistresp").html(resp);
				}
		});
	});

	$(".optradio").click(function()
	{
		var ptype 	= 	$("#pgm_form input[type='radio']:checked").val();
		$.ajax({
				data 	: "ptype="+ptype,
				type 	: "POST",
				url 	: "<?php echo $this->config->item("admin_url")."programs/getProgarmData"; ?>",
				success : function(resp)
				{
					$(".pdetails").html(resp);
				}
		});
	});
});
	$("#pgm-submit").click(function()
	{
		if($("#pgm_form").validationEngine('validate'))
		{
			var dataString 	=	$("#pgm_form").serialize();
			$.ajax({
				data 	: dataString,
				type 	: "POST",
				url 	: "<?php echo $this->config->item("admin_url")."programs/programSubmit"; ?>",
				success : function(resp)
				{
					$("#sub_resp").html(resp);
					setTimeout(function(){ $("#sub_resp").html("");$('#myModal').modal('hide'); },2000);
					$("#pgm_form")[0].reset(); 
				}
			});

		}
	});
</script>