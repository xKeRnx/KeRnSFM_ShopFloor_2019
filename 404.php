<?php $__TOKEN = "hardcodeshitbykernstudios"; require_once('Include/_init.php'); ?>
<?php include('Include/head.php'); ?>

	
		<!-- Error wrapper -->
		<div class="container-fluid text-center">
			<img src="assets/images/error/404.png" class="error_img img-responsive" alt=""/>
			<h3 class="text-light m-b-20"><?php echo getlang('sitenotfound'); ?></h3>

			<div class="row">
				<div class="col-lg-4 col-lg-offset-4">
					<form action="#" class="main-search">

						<div class="row m-t-20">
							<div class="">
								<a href="<?php echo $_SITEURL; ?>" class="btn btn-danger btn-labeled btn-block"><b><i class="icon-display4"></i></b> Go to dashboard</a>
							</div>
						</div>
						
					</form>
				</div>
			</div>
			<div class="row m-t-20">
				<div class="col-sm-12">
					<div class="footer-left">
						<span><?php echo $_SITEFOOTER; ?></span>
					</div>
				</div>
			</div>
		</div>
		<!-- /error wrapper -->

