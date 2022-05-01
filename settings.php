<?php $__TOKEN = "hardcodeshitbykernstudios"; require_once('Include/_init.php'); 
if (isset($_SESSION['id'])){
	$suid = trim($_SESSION['id']);
	$suid = strip_tags($suid);
	$suid = htmlspecialchars($suid);
	$suid = mssql_escape_string($suid);	
	
	$aselsql0 = "SELECT id, Department, FName, LName FROM user where id='$suid'";
	$aselres0 = $conn->query($aselsql0);

	if ($aselres0->num_rows == 1) {
		$aselrow0 = $aselres0->fetch_assoc();
		$aseldep = $aselrow0["Department"];
		$aselid = $aselrow0["id"];
		$FName = $aselrow0["FName"];
		$LName = $aselrow0["LName"];
			
		$aselsql1 = "SELECT name FROM department WHERE id='$aseldep'";
		$aselres1 = $conn->query($aselsql1);

		if ($aselres1->num_rows == 1) {
			$aselrow1 = $aselres1->fetch_assoc();
			$aseldepa = $aselrow1["name"];
		}else{
			$aseldepa = 'Unknown';
		}

	}else{
		$FName = "";
		$LName ="";
	}
	
	
?>
<?php include('Include/head.php'); ?>
<?php include('Include/navbar.php'); ?>

			<!--Page Header-->
			<div class="header">
				<div class="header-content">
					<div class="page-title">
						<i class="icon-cogs position-left"></i><?php echo getlang('settings'); ?>
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
								<h5 class="panel-title"><?php echo getlang('changename'); ?></h5>
							</div>					
							<div class="panel-body">
								<?php
								if (isset($_POST["savenamebtn"])) {
									$fnameinput = trim($_POST["fnameinput"]);
									$fnameinput = strip_tags($fnameinput);
									$fnameinput = htmlspecialchars($fnameinput);
									$fnameinput = mssql_escape_string($fnameinput);
									
									$lnameinput = trim($_POST["lnameinput"]);
									$lnameinput = strip_tags($lnameinput);
									$lnameinput = htmlspecialchars($lnameinput);
									$lnameinput = mssql_escape_string($lnameinput);
									
									$changenamesql = "UPDATE user SET FName='$fnameinput', LName='$lnameinput' WHERE id='$suid'";
									$changenameresult = $conn->query($changenamesql);
									
									$userindblog = "has changed names";
									$changeuserlogsql = "INSERT INTO user_log(userid, log) VALUES('$suid', '$userindblog')";
									$changeuserlogresult = $conn->query($changeuserlogsql);
									
									if($changenameresult AND $changeuserlogresult){
										$FName = $fnameinput;
										$LName = $lnameinput;
										echo '<div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered"><span class="text-semibold">Success message!</span> '.getlang('saved').'</div>';	
									}else{
										echo '<div class="alert alert-warning no-border"><span class="text-semibold">Unkonwn Error!</span> '.getlang('contact_admin').'</div>';
									}
								}
								?>
								<form method="post">
									<div class="form-group">
										<input type="text" id="fnameinput" name="fnameinput" placeholder="<?php echo getlang('firstname'); ?>" value="<?php echo $FName; ?>" class="form-control input-md"> </div>
									<div class="form-group">
										<input type="text" id="lnameinput" name="lnameinput" placeholder="<?php echo getlang('lastname'); ?>" value="<?php echo $LName; ?>" class="form-control input-md"> </div>						
									<button type="submit" name="savenamebtn" class="btn btn-danger"><?php echo getlang('save'); ?></button>
								</form>
							</div>
						</div>						
					</div>
					
					<div class="col-md-6 col-sm-6">
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title"><?php echo getlang('changepass'); ?></h5>
							</div>					
							<div class="panel-body">
								<?php
								if (isset($_POST["changepassbtn"])) {
									$oldpass = trim($_POST["oldpass"]);
									$oldpass = strip_tags($oldpass);
									$oldpass = htmlspecialchars($oldpass);
									$oldpass = mssql_escape_string($oldpass);
									$oldpass = md5($oldpass);
									
									$newpass = trim($_POST["newpass"]);
									$newpass = strip_tags($newpass);
									$newpass = htmlspecialchars($newpass);
									$newpass = mssql_escape_string($newpass);
									
									$repnewpass = trim($_POST["repnewpass"]);
									$repnewpass = strip_tags($repnewpass);
									$repnewpass = htmlspecialchars($repnewpass);
									$repnewpass = mssql_escape_string($repnewpass);
									
									$changepasssql =("SELECT id,USER,PASSW, HASH FROM user WHERE id='$suid'");
									$changepassresult = $conn->query($changepasssql); 
									$changepassrow = $changepassresult->fetch_assoc();
									$changepassdbpass =  $changepassrow['PASSW'];
									
									if(($result->num_rows == 1) && (password_verify($oldpass, $changepassdbpass))) { 
										if ($newpass == $repnewpass){
											$newmd5pass = md5($newpass); 
											$newdbpass = password_hash($newmd5pass, PASSWORD_DEFAULT);
											$insnewpasssql = "UPDATE user SET PASSW='$newdbpass' WHERE id='$suid'";
											$insnewpassresult = $conn->query($insnewpasssql);
											
											$changepassdblog = "has changed password";
											$changepassdblogsql = "INSERT INTO user_log(userid, log) VALUES('$suid', '$changepassdblog')";
											$changepassdblogresult = $conn->query($changepassdblogsql);
											
											if($insnewpassresult AND $changepassdblogresult){
												echo '<div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered"><span class="text-semibold">Success message!</span> '.getlang('saved').'</div>';	
											}else{
												echo '<div class="alert alert-warning no-border"><span class="text-semibold">Unkonwn Error!</span> '.getlang('contact_admin').'</div>';
											}
										}else{
											echo '<div class="alert alert-warning no-border"><span class="text-semibold">Error:</span> '.getlang('new_pass_notsame').'</div>';
										}
									}else{
										echo '<div class="alert alert-warning no-border"><span class="text-semibold">Error:</span> '.getlang('wrong_oldpass').'</div>';
									}

								}
								?>
								<form method="post">
									<div class="form-group">
										<input type="password" name="oldpass" placeholder="<?php echo getlang('old_pass'); ?>" class="form-control input-md" autocomplete="off" required> </div>
									<div class="form-group">
										<input type="password" name="newpass" placeholder="<?php echo getlang('new_pass'); ?>" class="form-control input-md" autocomplete="off" required> </div>						
									<div class="form-group">
										<input type="password" name="repnewpass" placeholder="<?php echo getlang('new_pass_repeat'); ?>" class="form-control input-md" autocomplete="off" required> </div>	
									<button type="submit" name="changepassbtn" class="btn btn-danger"><?php echo getlang('save'); ?></button>
								</form>
							</div>				
							</div>
						</div>						
					</div>
				</div>

<?php include('Include/footer.php'); ?>
<?php include('Include/foot.php'); ?>
<?php 
}else{
	header("Location: ".$_SITEURL."Login");
}
?>