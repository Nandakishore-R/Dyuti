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
					<a href="<?php echo $this->config->item('admin_url')."abstractcat/add"; ?>"><button class="btn-success btn">ADD ABSTRACT CATEGORY</button></a>
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
												<th>Title</th>
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