  <?php $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
  $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
  $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
  $this->output->set_header('Pragma: no-cache'); ?>

  	<?php include("header.php"); ?>
	
	<?php include("extrabar.php"); ?>

	<?php include("navbar.php"); ?>

	<div id="wrapper">
		<div id="layout-static">
			<?php include("sidebar.php"); ?>
			<div class="static-content-wrapper">
				<?php echo $contents; ?>
				<?php include("footer.php"); ?>
			</div>
		</div>
	</div>
	
	<?php include("footer-script.php"); ?>