<?php $__TOKEN = "hardcodeshitbykernstudios"; require_once('Include/_init.php');

if (isset($_SESSION['id'])){
	header("Location: ".$_SITEURL."");
}else{
?>

<!doctype html>
<html style="height:100%">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title><?php echo $_SITETITLE; ?></title>	
	<link href="assets/images/favicon.ico" rel="apple-touch-icon" type="image/png" sizes="144x144">
	<link href="assets/images/favicon.ico" rel="apple-touch-icon" type="image/png" sizes="114x114">
	<link href="assets/images/favicon.ico" rel="apple-touch-icon" type="image/png" sizes="72x72">
	<link href="assets/images/favicon.ico" rel="apple-touch-icon" type="image/png">
	<link href="assets/images/favicon.ico" rel="icon" type="image/png">
	<link href="assets/images/favicon.ico" rel="shortcut icon">
	
	<!-- Global stylesheets -->	
	<link type="text/css" rel="stylesheet" href="assets/fonts/fonts.css">
    <link type="text/css" rel="stylesheet" href="assets/icons/icomoon/icomoon.css">    
	<link type="text/css" rel="stylesheet" href="/../assets/css/bootstrap.css">   
	<link type="text/css" rel="stylesheet" href="/../assets/css/core.css">
	<link type="text/css" rel="stylesheet" href="/../assets/css/bootstrap-extended.css">	    		
	<link type="text/css" rel="stylesheet" href="/../assets/css/plugins.css">	    		
	<link type="text/css" rel="stylesheet" href="/../assets/css/color-system.css">
	<!-- /global stylesheets -->

</head>
<body style="height:100%; background:url('assets/images/assets/login_bg.jpg') no-repeat 0 0; background-size:cover;">
	<div class="login-container material">

		<!-- Page content -->
		<div class="page-content">

			<!-- Simple login form -->
			<form action="#">			
				<div class="login-form no-border no-border-radius">							
					<div class="welcome bg-success p-t-20">						
						<div class="welcome-text text-size-huge text-light"><?php echo getlang('signupheader'); ?></div>
					</div>
					<div class="panel panel-flat no-border">
						<div class="panel-body">
							<div id="chUnamMsage" class="form-group"></div>
							
							<div class="form-group">
								<input type="email" id="chunam" class="form-control" placeholder="<?php echo getlang('email'); ?>" name="Email" required="required">							
							</div>

							<div class="form-group">
								<input type="password" id="chupass" class="form-control" placeholder="<?php echo getlang('password'); ?>" name="password" required="required">							
							</div>
							
							<div class="form-group">
								<input type="password" id="chupass1" class="form-control" placeholder="<?php echo getlang('reppass'); ?>" name="RepeatPassword" required="required">							
							</div>
							
							<div class="form-group">
								<div class="checkbox m-l-5">
									<label>
										<input type="checkbox" id="chbox" class="styled">
										<?php echo getlang('accepttherms'); ?>
									</label>
								</div>									
							</div>

							<div class="login-options">
								<div class="row">
									<div class="text-right m-r-10">
										<button type="button" onclick="Signup();" class="btn bg-success no-border-radius"><?php echo getlang('register'); ?></button>																		
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</form>
			<!-- /simple login form -->


			<!-- Footer -->
			<div class="footer text-size-mini">
				<?php echo $_SITEFOOTER; ?>
			</div>
			<!-- /footer -->

		</div>
		<!-- /page content -->

	</div>

<!-- Global scripts -->
<script type="text/javascript" src="/../assets/js/jquery.js"></script>	
<script type="text/javascript" src="/../assets/js/custom.js"></script>	
<script type="text/javascript" src="/../assets/js/bootstrap.js"></script>
<script type="text/javascript" src="/../assets/js/forms/uniform.min.js"></script>	
<!-- /global scripts -->
	
<script>
$(function() {
	$(".styled, .multiselect-container input").uniform({
		radioClass: 'choice'
	});
	$('input,textarea').focus(function(){
	   $(this).data('placeholder',$(this).attr('placeholder'))
			  .attr('placeholder','');
	}).blur(function(){
	   $(this).attr('placeholder',$(this).data('placeholder'));
	});
});

function Signup(){
	var chunam = document.getElementById("chunam").value;
	var chpass = document.getElementById("chupass").value;
	var chpass1 = document.getElementById("chupass1").value;
	var chUnamMsage = document.getElementById("chUnamMsage");
	
	if (document.getElementById('chbox').checked) {
		if (chunam != ""){
			if (chpass == chpass1){
					var data = new FormData();
					data.append('user', chunam);
					data.append('pass', chpass);

					var xhr = new XMLHttpRequest();
					xhr.open('POST', '../ins/signup.php', true);
					xhr.onload = function () {
						var chunammasg = trim(this.responseText);
						if (chunammasg == "error"){
							chUnamMsage.innerHTML = '<font color="red"><?php echo getlang('error'); ?></font>';
						}else if (chunammasg == "error1"){
							chUnamMsage.innerHTML = '<font color="red"><?php echo getlang('error1'); ?></font>';
						}else if (chunammasg == "noemail"){
							chUnamMsage.innerHTML = '<font color="red"><?php echo getlang('novalidemail'); ?></font>';
						}else{
							window.location = window.location.href ;
						}
														
					};
					xhr.send(data);
			}else{
				chUnamMsage.innerHTML = '<font color="red"><?php echo getlang('passwordnotsame'); ?></font>';
			}
		}else{
			chUnamMsage.innerHTML = '<font color="red"><?php echo getlang('choseemail'); ?></font>';
		}
    } else {
		chUnamMsage.innerHTML = '<font color="red"><?php echo getlang('accepttherms'); ?></font>';
	}
}
</script>	
</body>
</html>
<?php } ?>