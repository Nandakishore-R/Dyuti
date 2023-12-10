<div class="static-content">
	<div class="page-content">
		<ol class="breadcrumb">

			<li><a href="<?php echo $this->config->item('admin_url')."dashboard"; ?>">Dashboard</a></li>
			<?php if($paymentData) { ?>
				<li><a href="<?php echo $this->config->item('admin_url')."paidusers"; ?>">Paid Users</a></li>
			<?php } else {?>
				<li><a href="<?php echo $this->config->item('admin_url')."freeusers"; ?>">Unpaid Users</a></li>
			<?php }?>
			<li><?php echo $page_title; ?></li>

		</ol>
		<div class="page-heading">
			<h1><?php echo $page_title; ?></h1>
		</div>


		<div class="row">
			<div class="col-md-12 resp"></div>
		</div>


		<div class="container-fluid">
			

			<!-- <h2>Dynamic Tabs</h2> -->
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#home">Profile</a></li>
				<li><a data-toggle="tab" href="#menu1">Abstract</a></li>
				<?php if($paymentData) { ?>
				<li><a data-toggle="tab" href="#payment">Payment</a></li>
				<?php } ?>
			</ul>

			<div class="tab-content">
				<div id="home" class="tab-pane fade in active">
					<p>
						<div class="row">
							<div class="col-sm-3">

								<div class="panel panel-profile">
									<div class="panel-body">
										<?php if($row->image<>"") { ?>
											<img src="<?php echo $this->config->item('base_url')."uploads/userprofile/".$row->image; ?>" class="img-circle">
											<?php } else { ?>
												<img src="<?php echo $this->config->item('base_url')."assets/admin/img/not-available.png"; ?>" class="img-circle">
												<?php } ?>
												<div class="name"><?php echo $row->title." ".$row->first_name." ".$row->last_name; ?></div>
												<div class="info"><?php echo $row->email; ?></div>
												<button data-uid="<?php echo $id; ?>" type="button" class="btn btn-success newpan" data-toggle="modal" data-target="#myModal"><i class="fa fa-envelope fa-fw"></i> SEND MESSAGE</button>
												<button data-uid="<?php echo $id; ?>" type="button" class="btn btn-success newpan paymntbt" data-toggle="modal" data-target="#myPayment"><i class="fa fa-inr fa-fw"></i> ADD PAYMENT</button>

												<input type="hidden" name="paystatus" value="<?php echo $row->payment_status; ?>" id="paystatus">

											</div>
										</div><!-- panel -->

									</div><!-- col-sm-3 -->



									<div class="col-sm-9">

										<div class="panel panel-default">

											<div class="panel-body">
												<div class="about-area">
													<div class="table-responsive">
														<table class="table">
															<tbody>
																<tr>
																	<th>Date Of Birth</th>
																	<td><?php echo $row->dob; ?></td>
																</tr>
																
																<tr>
																	<th>Gender</th>
																	<td><?php echo $row->gender; ?></td>
																</tr>
																
																

																<tr>
																	<th>Position</th>
																	<td><?php echo $row->position; ?></td>
																</tr>
																
																<tr>
																	<th>Area of Specialization</th>
																	<td><?php echo $row->areap; ?></td>
																</tr>
																
																	<tr>
																	<th>Food Preference</th>
																	<td><?php echo $row->food; ?></td>
																</tr>
																
																	<tr>
																	<th>Accomodation</th>
																	<td><?php echo $row->accomodation; ?></td>
																</tr>
																
																	<tr>
																	<th>Registration Category</th>
																	<td><?php echo $row->category; ?></td>
																</tr>
																
																
																
																
																
																
																<tr>
																	<th>State</th>
																	<td><?php echo $row->state; ?></td>
																</tr>
																<tr>
																	<th>Country</th>
																	<td><?php echo $row->country; ?></td>
																</tr>
																<tr>
																	<th>Company</th>
																	<td><?php echo $row->company; ?></td>
																</tr>

																<tr>
																	<th>Phone</th>
																	<td><?php echo $row->phone; ?></td>
																</tr>
																<tr>
																	<th>Address</th>
																	<td><?php echo $row->address; ?></td>
																</tr>
															</tbody>
														</table>
													</div>
												</div> 
											</div>
										</div>


									</div>


								</div>
							</p>
						</div>


						<div id="menu1" class="tab-pane fade">

							<div class="row">
								<div class="col-sm-12">

									<div class="row abstractview">
										<?php if($abstract) {?>
											<div class="col-md-2 pull-right" style="margin-bottom:20px;">
					<a href="<?php echo $this->config->item("admin_url")."paidusers/downloadAbstract/".$id; ?>"><button class="btn btn-success"><i class="fa fa-download fa-fw"></i> DOWNLOAD ABSTRACT</button></a>
				</div>

											<div class="col-md-12">
												<div class="row top-head">
													<div class="col-md-6">
														<?php $subDate 	=	strtotime($abstract->submission_date); echo date("d M Y",$subDate); ?> 
													</div> 
													<div class="col-md-6 pull-right cat-title">
														<?php echo $abstract->cattitle; ?> 
													</div> 

												</div>
												<div class="row">
													<div class="col-md-12">
														<h3 class="ab_title"><?php echo $abstract->abtitle; ?></h3>
													</div> 
												</div>

												<div class="row">
													<div class="col-md-12 abdata">
														<?php echo $abstract->ab_content; ?>
													</div> 
												</div>

												<div class="row">
													<div class="col-md-12 tags">
														<?php echo $abstract->tags; ?>
													</div> 
												</div>
											</div>
											<?php } else { ?>
												<div class="col-md-12"><div class="alert alert-warning"><strong>Sorry !</strong> No result found.</div></div>
												<?php } ?>


											</div><!-- well end -->


										</div><!-- col-sm-8 -->

									</div> 
								</div>

								<div id="payment" class="tab-pane fade">
									<div class="row">
										<div class="col-md-12">
											<div class="row abstractview">
												<?php if($paymentData) { 
													if($paymentData->payment_type == 1) {?>
														<div class="col-md-12"> 
															<div class="panel panel-default"> 
																<div class="panel-body">
																	<div class="about-area">
																		<div class="table-responsive">
																			<table class="table">
																				<tbody>
																					<tr>
																						<th>Demand Draft Number</th>
																						<td><?php echo $paymentData->ddno; ?></td>
																					</tr>

																					<tr>
																						<th>Bank</th>
																						<td><?php echo $paymentData->bank; ?></td>
																					</tr>	
																					<tr>
																						<th>Date</th>
																						<td><?php echo $paymentData->dd_date; ?></td>
																					</tr>
																					<tr>
																						<th>Note</th>
																						<td><?php if($paymentData->note){echo $paymentData->note; } else { echo "--"; } ?></td>
																					</tr>  
																				</tbody>
																			</table>
																		</div></div></div> 

																	</div>

																</div>
																<?php } else if($paymentData->payment_type == 2)  { ?>


																	<div class="col-md-12"> 
															<div class="panel panel-default"> 
																<div class="panel-body">
																	<div class="about-area">
																		<div class="table-responsive">
																			<table class="table">
																				<tbody>
																					<tr>
																						<th>NEFT Transaction ID</th>
																						<td><?php echo $paymentData->neft; ?></td>
																					</tr>

																					<tr>
																						<th>Bank</th>
																						<td><?php echo $paymentData->bank; ?></td>
																					</tr>	
																					<tr>
																						<th>Date</th>
																						<td><?php echo $paymentData->op_date; ?></td>
																					</tr>
																					<tr>
																						<th>Note</th>
																						<td><?php if($paymentData->note){echo $paymentData->note; } else { echo "--"; } ?></td>
																					</tr>  
																				</tbody>
																			</table>
																		</div></div></div> 

																	</div>

																</div>



																<?php } else { ?> <div class="col-md-12"><div class="alert alert-warning"><strong>Sorry !</strong> No result found.</div></div> <?php } } else { ?> 
																	<div class="col-md-12"><div class="alert alert-warning"><strong>Sorry !</strong> No result found.</div></div>

																	<?php } ?>
																</div></div>




															</div>
														</div>



													</div>




												</div> <!-- .container-fluid -->
											</div> <!-- #page-content -->
										</div>

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
																			<input type="hidden" name="uid" id="uid">
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





										<!-- Add Payment -->
										<div id="myPayment" class="modal fade" role="dialog">
											<div class="modal-dialog">

												<!-- Modal content-->
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h4 class="modal-title">Add Payment</h4>
													</div>

													<div class="modal-body">



														<div class="row form_area">
															<div class="col-xs-12">
																

																	<div class="row">
																		<ul class="nav nav-tabs">
																		<li class="active"><a data-toggle="tab" href="#ddp">DD Payment</a></li>
																		<li><a data-toggle="tab" href="#op">Online Payment</a></li>
																		</ul>
																	</div>
																	<div class="tab-content">
																	<div id="ddp" class="tab-pane fade in active">
																	<form id="payment_form">
																	<div class="row">
																		<div class="col-md-6">
																			<label for="focusinput" class="control-label">Demand Draft NO.</label>
																			<input type="text" class="form-control validate[required,custom[integer]]" name="ddno" id="ddno" placeholder="Demand Draft NO">
																		</div>
																		<div class="col-md-6">
																			<label for="focusinput" class="control-label">Date</label>
																			<input type="text" name="dd_date" class="form-control validate[required] dd_date" id="dd_date" readonly="" placeholder="Date">
																		</div>
																	</div>

																	<div class="row">
																		<div class="col-md-12">
																			<label for="focusinput" class="control-label">Bank Name</label>
																			<input type="text" class="form-control validate[required]" name="bank" id="bank" placeholder="Bank Name">
																		</div>
																	</div>

																	<div class="row">
																		<div class="col-md-12">
																			<label for="focusinput" class="control-label">Note</label>
																			<input type="hidden" name="uid" id="uid">
																			<textarea class="form-control" name="note" id="note" placeholder="Note"></textarea>
																		</div>
																	</div>

																	<div class="row">
																		<div class="col-md-12">
																			<input type="button" class="btn btn-primary add_pay" name="sendbtn" value="SUBMIT" id="add_pay">
																		</div>
																	</div>
																	</form>

																	</div>

																	<div id="op" class="tab-pane fade">
																		<form id="payment_formop">
																	<div class="row">
																		<div class="col-md-6">
																			<label for="focusinput" class="control-label">NEFT Transaction ID.</label>
																			<input type="text" class="form-control validate[required]" name="neft" id="neft" placeholder="NEFT Transaction ID">
																		</div>
																		<div class="col-md-6">
																			<label for="focusinput" class="control-label">Date</label>
																			<input type="text" name="opdate" class="form-control validate[required] dd_date" id="opdate" readonly="" placeholder="Date">
																		</div>
																	</div>

																	<div class="row">
																		<div class="col-md-12">
																			<label for="focusinput" class="control-label">Bank Name</label>
																			<input type="text" class="form-control validate[required]" name="opbank" id="opbank" placeholder="Bank Name">
																		</div>
																	</div>

																	<div class="row">
																		<div class="col-md-12">
																			<label for="focusinput" class="control-label">Note</label>
																			<textarea class="form-control" name="opnote" id="opnote" placeholder="Note"></textarea>
																		</div>
																	</div>

																	<div class="row">
																		<div class="col-md-12">
																			<input type="button" class="btn btn-primary add_pay_op" name="sendbtn" value="SUBMIT" id="add_pay_op">
																		</div>
																	</div>
																	</form>
																	</div>
																</div>
																	
																
															</div>
														</div>

													</div>


												</div>

											</div>
										</div>
										<!-- Add payment end here-->

										<style type="text/css">
											.datepicker{z-index: 9999 !important;  }
										</style>

										<script type="text/javascript">

											$(document).ready(function()
											{


												$(".payment_type").click(function()
												{
													if($("input[class='payment_type']:checked").val()) {
														var type_val 	=	$("input[class='payment_type']:checked").val();
														var uid 		=	$("#uid").val();
												       $.ajax({
															data 	: "uid="+uid+"&type_val="+type_val,
															type 	: "POST",
															url 	: "<?php echo $this->config->item("admin_url")."paidusers/getFieldDetails"; ?>",
															success : function(resp)
															{
																$(".extrafield").html(resp);
																$(document).on('click',"#dd_date",function()
																{
																	$("#dd_date").datepicker();
																	$("#dd_date").datepicker("show"); 
																});

															}
														});
												    }
												});

												var paystatus 	=	$("#paystatus").val();
												if(paystatus == 1) {
													$(".paymntbt").hide();
												}

												$(".newpan").click(function()
												{
													var uid 		=	$(this).data("uid");
													$("#uid").val(uid);
												});

												$("#sendbtn").click(function()
												{
													var uid 		=	$("#uid").val();
													var message 	=	$("#message").val();
													if(message == "")
													{
														alert("Please write a message");
													} else {
														$.ajax({
															data 	: "uid="+uid+"&message="+message,
															type 	: "POST",
															url 	: "<?php echo $this->config->item("admin_url")."freeusers/sendMessage"; ?>",
															success : function(resp)
															{
																$(".resp").html(resp);
																$("#message").html("");
																$('#myModal').modal('hide');
																$("#pgm_form")[0].reset(); 
																setTimeout(function(){ $(".resp").html("");},2000);
															}
														});
													}
												});


												$("#add_pay").click(function()
												{
													if($("#payment_form").validationEngine('validate'))
													{
														var uid 		=	$("#uid").val();
														var dd_date 	=	$("#dd_date").val();
														var bank 		=	$("#bank").val();
														var ddno 		=	$("#ddno").val();
														var note 		=	$("#note").val();

														$.ajax({
															data 	: "uid="+uid+"&dd_date="+dd_date+"&bank="+bank+"&ddno="+ddno+"&note="+note,
															type 	: "POST",
															url 	: "<?php echo $this->config->item("admin_url")."freeusers/addPayment"; ?>",
															success : function(resp)
															{
																$(".resp").html(resp);
																$('#myPayment').modal('hide');
																$("#payment_form")[0].reset(); 
																setTimeout(function(){ $(".resp").html("");},2000);
																$(".paymntbt").hide();
															}
														});
													}
												});

												$("#add_pay_op").click(function()
												{
													if($("#payment_formop").validationEngine('validate'))
													{
														var uid 		=	$("#uid").val();
														var op_date 	=	$("#opdate").val();
														var opbank 		=	$("#opbank").val();
														var neft 		=	$("#neft").val();
														var opnote 		=	$("#opnote").val();

														$.ajax({
															data 	: "uid="+uid+"&op_date="+op_date+"&opbank="+opbank+"&neft="+neft+"&opnote="+opnote,
															type 	: "POST",
															url 	: "<?php echo $this->config->item("admin_url")."freeusers/addOnlinePayment"; ?>",
															success : function(resp)
															{
																$(".resp").html(resp);
																$('#myPayment').modal('hide');
																$("#payment_formop")[0].reset(); 
																setTimeout(function(){ $(".resp").html("");},2000);
																$(".paymntbt").hide();
															}
														});
													}
												});
												





											});
										</script>


										<script src="<?php echo $this->config->item('base_url');?>assets/datepicker/js/bootstrap-datepicker.js"></script>

										<script>
											$('.dd_date').datepicker({
												format: 'yyyy-mm-dd'
											});

											 

										</script>

