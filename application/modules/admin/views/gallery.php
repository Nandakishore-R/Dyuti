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
			<div class="row">
				<div class="col-md-12 pull-right">
					<a href="<?php echo $this->config->item('admin_url')."gallery/add"; ?>"><button class="btn-success btn">ADD GALLERY CATEGORY</button></a>
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
												<th>Category</th>
												<th>Image</th>
												<th>Active</th>
												<th>Settings</th>
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



<!--Add Product Gallery -->
<div id="galModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">ADD GALLERY</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-12">
						<?php echo form_open_multipart($imgaction); ?>
						<div class="form-group">
							<label for="">Title</label>
							<input type="text" name="title" id="title" class="form-control">
						</div>
						<div class="form-group">
							<input type="hidden" name="imid" id="imid">
							<label for="">Choose image (357 X 515)</label>
							<input type="file" name="userfile" id="userfile" multiple>
						</div>
						<div class="form-group">
							<button class="btn-success btn" type="submit">Save</button>
						</div>
						<div class="form-group">
							<i id="loader" class="fa fa-spinner fa-spin"></i>
						</div>
						<div class="form-group">
							<img id="preview" src="#" style="height: 80px;border: 1px solid #DDC; " />
						</div>
						<?php echo form_close(); ?>
					</div>
				</div>


				<div class="row">
					<div class="col-sm-12">
						<div class="row clear-fix">
							<div class="col-md-12">
								<div id="response">

								</div>  
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12">
						<div style="margin-top: 1%;">

							<ul class="list-inline"  id="gallery">

							</ul>

						</div>  
					</div>
				</div>

			</div>

			<div class="modal-footer">

			</div>
		</div>

	</div>
</div>


<script>
	$(document).ready(function (){
		$(document).on("click", ".imgAdd", function () 
		{
			var imid = $(this).data('imid');
			$(".modal-body #imid").val(imid);
			loadgallery();
		});
		function readURL(input) {
			$("#preview").show();
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					$('#preview').attr('src', e.target.result);
				};
				reader.readAsDataURL(input.files[0]);
			}
		}
		$("#userfile").change(function(){
			readURL(this);
		});
		$('form').ajaxForm({
			beforeSend: function() {
				$("#loader").show();
			},
			complete: function(xhr) {
				$(".modal-body #response").html(xhr.responseText);
				$("#loader").hide();
				$("#preview").hide();
				$('form').resetForm();
				setTimeout(function(){ $(".alertOne").hide();} ,2000); 
				loadgallery();
				$("#title").val("");
			}
		}); 

		function  loadgallery(){
			var imid              =   $("#imid").val();
			$.ajax({
				url   : '<?php echo $this->config->item('admin_url').'gallery/fillGallery'; ?>',
				data  : "imid="+imid,
				type  : 'POST'
			}).done(function (data){
				$(".modal-body #gallery").html(data);
				var btnDelete  = $(".modal-body #gallery").find($(".btn-delete"));
				(btnDelete).on('click', function (e){
					e.preventDefault();
					var id = $(this).attr('id');
					$("#"+id+"g").hide();
					$.ajax({
						url:'<?php echo $this->config->item('admin_url').'gallery/deleteimg'; ?>',
						data:'id='+id,
						type:'POST'
					}).done(function (data){
						$(".modal-body #response").html(data);
						setTimeout(function(){ $(".alertOne").hide();} ,2000); 
					});
				});

			});
		}

	});


</script>