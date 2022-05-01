<?php $__TOKEN = "hardcodeshitbykernstudios"; require_once('Include/_init.php'); 
if (isset($_SESSION['id'])){
	$suid = trim($_SESSION['id']);
	$suid = strip_tags($suid);
	$suid = htmlspecialchars($suid);
	$suid = mssql_escape_string($suid);	
	

?>
<?php include('Include/head.php'); ?>
<?php include('Include/navbar.php'); ?>

			<!--Page Header-->
			<div class="header">
				<div class="header-content">
					<div class="page-title">
						<i class="icon-file-media position-left"></i> <?php echo getlang('settings'); ?>
					</div>
					<ul class="breadcrumb">
						<li><a href="<?php echo $_SITEURL; ?>"><?php echo getlang('home'); ?></a></li>						
						<li class="active"><?php echo getlang('settings'); ?></li>
					</ul>					
				</div>
			</div>		
			<!--/Page Header-->
		
			<div class="container-fluid page-content">
				
				<div class="row">
					<div class="col-md-6 col-sm-6">
					
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title">Need to know more?</h5>
							</div>
							
							<div class="panel-body">
								<p class="c-font-lowercase">Try visiting our FAQ page to learn more about our greatest ever expanding template.</p>
								<button class="btn btn-primary">Learn More</button>
							</div>
						</div>
						
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title">Have a question?</h5>
							</div>
							
							<div class="panel-body">
								<form action="#">
									<div class="input-group input-group-lg c-square">
										<input type="text" class="form-control c-square" placeholder="Ask a question">
										<span class="input-group-btn">
											<button class="btn btn-primary" type="button">Go!</button>
										</span>
									</div>
								</form>
								<br />
								<p>Ask your questions away and let our dedicated customer service help you look through our FAQs to get your questions answered.</p>
							</div>
						</div>											
					</div>
					<div class="col-md-6 col-sm-6">
					
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title">Keep in touch</h5>
							</div>					
							<div class="panel-body">
								<p class="c-font-lowercase">Our helpline is always open to receive any inquiry or feedback. Please feel free to drop us an email from the form below and we will get back to you very soon.</p>
								<form action="#">
								<div class="form-group">
									<input type="text" placeholder="Your Name" class="form-control input-md"> </div>
								<div class="form-group">
									<input type="text" placeholder="Your Email" class="form-control input-md"> </div>						
								<div class="form-group">
									<textarea rows="3" name="message" placeholder="Write comment here ..." class="form-control input-md"></textarea>
								</div>
								<button type="submit" class="btn btn-danger">Submit</button>
							</form>
							</div>
						</div>																	
					</div>
				</div>

<?php include('Include/footer.php'); ?>

<!-- Page scripts -->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyA9M9kmTeRBgP_QwbLd_5_vWRYo2C2JnsM"></script>
<script src="/../assets/js/maps/google/markers/simple.js"></script>
<!-- /page scripts -->
<?php include('Include/foot.php'); ?>
<?php 
}else{
	header("Location: ".$_SITEURL."Login");
}
?>