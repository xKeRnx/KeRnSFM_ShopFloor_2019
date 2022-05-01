<?php $__TOKEN = "hardcodeshitbykernstudios"; require_once('../Include/_init.php');
if (isset($_REQUEST["user"]) AND isset($_REQUEST["pass"])) {
	$user = trim($_REQUEST["user"]);
	$user = strip_tags($user);
	$user = htmlspecialchars($user);
	$user = mssql_escape_string($user);
	
	$pass = trim($_REQUEST["pass"]);
	$pass = strip_tags($pass);
	$pass = htmlspecialchars($pass);
	$pass = mssql_escape_string($pass);
	$md5pass = md5($pass); 
	$password = password_hash($md5pass, PASSWORD_DEFAULT);
	
	$query =("SELECT USER FROM user WHERE user='$user'");
	$result = $conn->query($query); 
	if( $result->num_rows == 0) {
		if(filter_var($user, FILTER_VALIDATE_EMAIL)) {
			date_default_timezone_set("Europe/Berlin");
			$timestamp = time();
			$nowdate = date("ymdHis",$timestamp);
			$hash = $user.generateRandomString(20).$nowdate;
			$LogDa = date("Y-m-d H:i:s",$timestamp);  
			$loginhash = md5(md5($user.$hash).$LogDa);
				
			$UPhash = "INSERT INTO user(USER, HASH, PASSW) VALUES('$user', '$loginhash', '$password')";
			$INSHASH = $conn->query($UPhash);

			if($INSHASH){
				$_SESSION['id'] = mysqli_insert_id($conn);
				echo 'OK';			
			}else{
				echo 'error';
			}	
		}else{
			echo 'noemail';
		}
		
	}else{
		echo 'error1';
	}
}else{
	echo 'error';
}

?>