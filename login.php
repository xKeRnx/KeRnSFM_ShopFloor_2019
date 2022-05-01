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
					<div class="welcome bg-blue p-t-20">						
						<div class="welcome-text text-size-huge text-light"><?php echo getlang('loginhead'); ?></div>
					</div>
					<div class="panel panel-flat no-border">
						<div class="panel-body no-padding-bottom">
							<div id="LogUnamMsage" class="form-group"></div>
							
							<div class="form-group">
								<input type="text" id="Logemail" class="form-control" placeholder="<?php echo getlang('email'); ?>" name="Email" required="required">							
							</div>

							<div class="form-group">
								<input type="password" id="Logupass" class="form-control" placeholder="<?php echo getlang('password'); ?>" name="password" required="required">							
							</div>

							<div class="login-options">
								<div class="row">
									<div class="col-sm-6 col-xs-6">
										<div class="checkbox">
											<label>
												<input type="checkbox" id="chbox" class="styled" checked="checked">
												<?php echo getlang('remember'); ?>
											</label>
										</div>
									</div>

									<div class="col-sm-6 col-xs-6 text-right">
										<button type="button" onclick="Login();" class="btn bg-blue no-border-radius">Login</button>																		
									</div>
								</div>
							</div>

							<div class="form-group text-center">
								<a href="login_password_recover.html"><?php echo getlang('passfor'); ?></a>
							</div>
							
						</div>
						<div class="panel-footer text-center">
							<a href="/registration"><?php echo getlang('register'); ?></a>
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


function Login(){
	var Logemail = document.getElementById("Logemail").value;
	var Logupass = document.getElementById("Logupass").value;
	var LogUnamMsage = document.getElementById("LogUnamMsage");
	var savelogin = "0";	
		
	if (Logemail != "" && Logupass != ""){
		if (document.getElementById('chbox').checked) {
			savelogin = "1";	
		}
		
		var data = new FormData();
		data.append('user', Logemail);
		data.append('pass', Logupass);
		data.append('savelogin', savelogin);
	
		var xhr1 = new XMLHttpRequest();
		xhr1.open('POST', '../ins/login.php', true);
		xhr1.onload = function () {
			var chunammasg = trim(this.responseText);
			if (chunammasg == "error"){
				LogUnamMsage.innerHTML = '<font color="red"><?php echo getlang('error'); ?></font>';
			}else if (chunammasg == "error1"){
				LogUnamMsage.innerHTML = '<font color="red"><?php echo getlang('wrongcredi'); ?></font>';
			}else{
				window.location = window.location.href ;
			}	
		};
		xhr1.send(data);
	}else{
		LogUnamMsage.innerHTML = '<font color="red"><?php echo getlang('missempass'); ?></font>';
	}
}
	
// function to trim strings
function trim(sVal)
{
	var sTrimmed = "";

	for (i = 0; i < sVal.length; i++)
	{
		if (sVal.charAt(i) != " " && sVal.charAt(i) != "\f" && sVal.charAt(i) != "\n" && sVal.charAt(i) != "\r" && sVal.charAt(i) != "\t")
		{
			sTrimmed = sTrimmed + sVal.charAt(i);
		}
	}

	return sTrimmed;
}	
</script>
</body>
</html>
<?php } ?>