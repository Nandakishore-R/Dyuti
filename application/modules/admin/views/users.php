<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('base_url');?>assets/multisel/jquery-ui.css" />
<script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/multisel/jquery-ui.min.js"></script>
<link href="<?php echo $this->config->item('base_url');?>assets/multisel/jquery.multiselect.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/multisel/jquery.multiselect.js"></script>
<script type="text/javascript">
$(function(){
	$("#dest_list").multiselect({
	});
});
$(function(){
	$("#moveinglist").multiselect({
	});
});
</script>



<div class="static-content">
	<div class="page-content">
		<ol class="breadcrumb">
			<li><a href="<?php echo $this->config->item('admin_url')."dashboard"; ?>">Dashboard</a></li>
			<li><?php echo $page_title; ?></li>
		</ol>

		<div class="page-heading">
			<h1><?php echo $page_title; ?></h1>
		</div>

		<div class="row">
			<div class="col-md-12 resp"></div>
		</div>

		<div class="container-fluid">
			<div class="row">

				<div class="col-md-5 ">
					<button data-paystatus="<?php echo $payStatus; ?>" type="button" class="btn btn-success sendall" data-toggle="modal" data-target="#myModal">SEND MESSAGE</button>
				</div>
				<?php if($payStatus==0) { ?>
				<div class="col-md-5 ">
					<button data-paystatus="<?php echo $payStatus; ?>" type="button" class="btn btn-success movetopaid" data-toggle="modal" data-target="#myModalMoveToPaid">MOVE TO PAID LIST</button>
				</div>
				<?php } ?>


				<div class="col-md-2 pull-right">
					<a href="<?php echo $this->config->item("admin_url")."paidusers/excel/".$payStatus; ?>"><button class="btn btn-success"><i class="fa fa-download fa-fw"></i> EXPORT EXCEL</button></a>
				</div>

				<div data-widget-group="group1">
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-default">
								<div class="panel-heading">
									<div class="panel-ctrls"></div>
								</div>

								<div class="panel-body no-padding">
									<table id="example" class="table" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>Sl. No</th>
												<th>Name</th>
												<th>Email Id</th>
												<!-- <th>Active</th> -->
												<th>View</th>
												<th>Delete</th>
											</tr>
										</thead>
										<tbody id="ajax_content">
											<?php echo $output; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Move to paid-->
<div id="myModalMoveToPaid" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Move to Paid User List</h4>
			</div>

			<div class="modal-body">

				<div class="row">
					<div class="col-xs-12">
						<form id="movetopaid_form">

							<div class="row">
								<div class="col-md-12">
									<label for="focusinput" class="control-label">Unpaid Users List</label><br/>
									<?php echo $movableusers; ?>
								</div>
							</div>
<br/><br/>
							<div class="row">
								<div class="col-md-12">
									<!-- <label for="focusinput" class="control-label">Note</label><br/> -->
									<input type="hidden" name="paymentstatus" id="paymentstatus">
									<!-- <textarea class="form-control" name="note" id="note" placeholder="note"></textarea> -->
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<input type="button" class="btn btn-primary movetopaid" name="movetopaid" value="MOVCE TO PAID" id="movetopaid">
								</div>
							</div>
						</form>
					</div>
				</div>

			</div>


		</div>

	</div>
</div>
<!-- Move to paid ends here-->

<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Send Message</h4>
			</div>

			<div class="modal-body">

				<div class="row">
					<div class="col-xs-12">
						<form id="pgm_form">

							<div class="row">
								<div class="col-md-12">
									<label for="focusinput" class="control-label">To</label><br/>
									<?php echo $userlist; ?>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<label for="focusinput" class="control-label">Message</label><br/>
									<input type="hidden" name="paystatus" id="paystatus">
									 <textarea class="form-control" name="message" id="message" placeholder="message"></textarea> 
								</div>
							</div>
							

							<div class="row">
								<div class="col-md-12">
									<input type="button" class="btn btn-primary send_btn" name="sendbtn" value="SEND" id="sendbtn">
								</div>
							</div>
						</form>
					</div>
				</div>

			</div>


		</div>

	</div>
</div>





<script type="text/javascript">

	$(document).ready(function()
	{

		$(".movetopaid").click(function()
		{
			var paystatus 		=	$(this).data("paystatus");
			$("#paymentstatus").val(paystatus);
		});

		$("#movetopaid").click(function()
		{
			var paymentstatus 			=	$("#paymentstatus").val();
			var note 					=	"";
			var moveinglist 			=	$("#moveinglist").val();
			if(moveinglist!=null){
			$.ajax({
				data 	: "paymentstatus="+paymentstatus+"&note="+note+"&moveinglist="+moveinglist,
				type 	: "POST",
				url 	: "<?php echo $this->config->item("admin_url")."freeusers/addBulkPayment"; ?>",
				success : function(resp)
				{
					$(".resp").html(resp);
					$("#note").html("");
					$('#myModalMoveToPaid').modal('hide');
					$("#movetopaid_form")[0].reset(); 
					setTimeout(function(){ $(".resp").html("");
					window.location.href="<?php echo $this->config->item("admin_url").'freeusers'; ?>"; },2000);
				}
			});
			} else {
				alert("Please fill all fields");
				$("#note").html("");   
			}

		});





		/*Mailing*/
		$(".sendall").click(function()
		{
			var paystatus 		=	$(this).data("paystatus");
			$("#paystatus").val(paystatus);
		});

		$("#sendbtn").click(function()
		{
			var paystatus 		=	$("#paystatus").val();
			var message 		=	$("#message").val();
			var user_list 		=	$("#dest_list").val();
			if(message != "" && user_list!=null){
			$.ajax({
				data 	: "paystatus="+paystatus+"&message="+message+"&user_list="+user_list,
				type 	: "POST",
				url 	: "<?php echo $this->config->item("admin_url")."freeusers/sendMessageAll"; ?>",
				success : function(resp)
				{
					$(".resp").html(resp);
					$("#message").html("");
					$('#myModal').modal('hide');
					$("#pgm_form")[0].reset(); 
					setTimeout(function(){$(".resp").html("");},2000); 
				}
			});
			} else {
				alert("Please fill all fields");
				$("#message").html("");   
			}

		});



	});
</script>