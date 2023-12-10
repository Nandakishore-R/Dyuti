<div class="static-content">
	<div class="page-content">
		<ol class="breadcrumb">

			<li><a href="<?php echo $this->config->item('admin_url')."dashboard"; ?>">Dashboard</a></li>
			<li><a href="<?php echo $this->config->item('admin_url')."allabstracts"; ?>">Abstracts</a></li>
			<li><?php echo $page_title; ?></li>

		</ol>
		<div class="page-heading">
			<h1><?php echo $page_title; ?></h1>
		</div>
		<div class="container-fluid">
			



			<div class="tab-content">
			<?php 
			$clzSub = $clzRec = $clzRev = $clzAcp = $clzRej ="";
			if($row->status == 0)
			{
				$clzSub = "checked='checked'";
			}
			else if($row->status == 1)
			{
				$clzRec = "checked='checked'";
			} else if($row->status == 2){
				$clzRev = "checked='checked'";
			} else if($row->status == 3){
				$clzAcp = "checked='checked'";
			} else {
				$clzRej = "checked='checked'";
			}

			?>
			<div class="row well">
				<div class="col-sm-10">
					<label id="clzsub" class="btn btn-primary"><input <?php echo $clzSub; ?> type="radio" name="abstract_stat" value="0"> Submitted</label>
					<label id="clzrec" class="btn btn-primary"><input <?php echo $clzRec; ?> type="radio" name="abstract_stat" value="1"> Received</label>
					<label id="clzrev" class="btn btn-primary"><input <?php echo $clzRev; ?> type="radio" name="abstract_stat" value="2"> Under Review</label>
					<label id="clzacp" class="btn btn-primary"><input <?php echo $clzAcp; ?> type="radio" name="abstract_stat" value="3" > Accepted</label>
					<label id="clzrej" class="btn btn-primary"><input <?php echo $clzRej; ?> type="radio" name="abstract_stat" value="4"> Rejected</label>
					<input type="hidden" id="curstatus" name="curstatus" value="<?php echo $row->status; ?>">
					<input type="hidden" id="abid" name="abid" value="<?php echo $row->id; ?>">
				</div>
				<div class="col-md-2 pull-right" style="margin-bottom:20px;">
					<a href="<?php echo $this->config->item("admin_url")."paidusers/downloadAbstract/".$row->userId; ?>"><button class="btn btn-success"><i class="fa fa-download fa-fw"></i> DOWNLOAD ABSTRACT</button></a>
				</div>

			</div>




				<div class="row">
					<div class="col-sm-12">

						<div class="row abstractview">
							<?php if($row) {?>

								<div class="col-md-12">
									<div class="row top-head">
										<div class="col-md-6">
											<?php strtotime($row->submission_date); echo date("d M Y"); ?> 
										</div> 
										<div class="col-md-6 pull-right cat-title">
											<?php echo $row->cattitle; ?> 
										</div> 

									</div>
									<div class="row">
										<div class="col-md-12">
											<h3 class="ab_title"><?php echo $row->abtitle; ?></h3>
										</div> 
									</div>

									<div class="row">
										<div class="col-md-12 abdata">
											<?php echo $row->ab_content; ?>
										</div> 
									</div>

									<div class="row">
										<div class="col-md-12 tags">
											<?php echo $row->tags; ?>
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




				</div> <!-- .container-fluid -->
			</div> <!-- #page-content -->
		</div> 
	

<script type="text/javascript">
	$(document).ready(function()
	{
		var curstatus 	=	$("#curstatus").val();
		
		setstatus(curstatus);

		$("input[name='abstract_stat']").click(function(){
	    	var chkval = $('input:radio[name=abstract_stat]:checked').val();
	    	var abid 	=	$("#abid").val();
	    	$.ajax({
	    		data 	: "chkval="+chkval+"&abid="+abid,
	    		type 	: "POST",
	    		url 	: "<?php echo $this->config->item("admin_url")."allabstracts/updateAbstractStatus"; ?>",
	    		success : function(resp)
	    		{
	    			setstatus(resp)
	    		}
	    	});
		}); 

		function setstatus(stat)
		{


			if(stat == 0)
			{ 
				$("label").removeClass('btn-success');
				$("label").removeClass('btn-danger');
				$("#clzsub").addClass("btn-success");  


			}else if(stat == 1)
			{
				$("label").removeClass('btn-success');
				$("label").removeClass('btn-danger');
				$("#clzsub").attr("disabled", "disabled"); 
				$("#clzrec").addClass("btn-success"); 
			} else if(stat == 2)
			{
				$("label").removeClass('btn-success');
				$("label").removeClass('btn-danger');
				$("#clzsub").attr("disabled", "disabled"); 
				$("#clzrec").attr("disabled", "disabled"); 
				$("#clzrev").addClass("btn-success");  
			} else if(stat == 3)
			{
				$("label").removeClass('btn-success');
				$("label").removeClass('btn-danger');
				$("#clzsub").attr("disabled", "disabled"); 
				$("#clzrec").attr("disabled", "disabled");
				$("#clzacp").addClass("btn-success");  
			} else if(stat == 4)
			{
				$("label").removeClass('btn-success');
				$("label").removeClass('btn-danger');
				$("#clzsub").attr("disabled", "disabled"); 
				$("#clzrec").attr("disabled", "disabled");
				$("#clzrej").addClass("btn-danger");  
			} 
		}

	});
</script>