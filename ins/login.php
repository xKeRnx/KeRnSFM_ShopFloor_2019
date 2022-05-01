<?php $__TOKEN = "hardcodeshitbykernstudios"; require_once('../Include/_init.php');
if (isset($_REQUEST["user"]) AND isset($_REQUEST["pass"]) AND isset($_REQUEST["savelogin"])) {
	$user = trim($_REQUEST["user"]);
	$user = strip_tags($user);
	$user = htmlspecialchars($user);
	$user = mssql_escape_string($user);
	
	$pass = trim($_REQUEST["pass"]);
	$pass = strip_tags($pass);
	$pass = htmlspecialchars($pass);
	$pass = mssql_escape_string($pass);
	
	$savelogin = trim($_REQUEST["savelogin"]);
	$savelogin = strip_tags($savelogin);
	$savelogin = htmlspecialchars($savelogin);
	$savelogin = mssql_escape_string($savelogin);
	
	$query =("SELECT id,USER,PASSW, HASH FROM user WHERE user='$user'");
	$result = $conn->query($query); 
	$row = $result->fetch_assoc();
	$dbpass =  $row['PASSW'];
	$id =  $row['id'];
	$runame = $row['id'];
	$password = md5($pass); 
	$LogUID = $row['id'];
	date_default_timezone_set("Europe/Berlin");
	$timestamp = time();
	$LogDa = date("Y-m-d H:i:s",$timestamp); 
	$loginhash = md5(md5($LogUID.$runame.$password).$LogDa);
	
	if(($result->num_rows == 1) && (password_verify($password, $dbpass))) { 
			$_SESSION['id'] = $id;
			if ($savelogin == "1"){
				setcookie("LogUseKeSESS", $loginhash, time() + 20736000, "/");
			}
			
			$UPhash = "INSERT INTO session(USERID,HASH) VALUES('$runame','$loginhash')";
			$conn->query($UPhash);	
			echo 'OK';			
	}else{
		echo 'error1';
	}
}else{
	echo 'error';
}

?>