<?php 
if($__TOKEN == "hardcodeshitbykernstudios"){
	if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off") {
		$location = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		header('HTTP/1.1 301 Moved Permanently');
		header('Location: ' . $location);
		exit;
	}
	
	ob_start();
	SESSION_START();
	
	$__CONFIG['SQLHost'] = 'localhost';
	$__CONFIG['SQLUID'] = 'kernsfmuser';
	$__CONFIG['SQLPWD'] = '';
	$__CONFIG['SQLDB'] = 'kernsfm';
	

	// Create connection
	$conn = new mysqli($__CONFIG['SQLHost'], $__CONFIG['SQLUID'], $__CONFIG['SQLPWD'], $__CONFIG['SQLDB']);
	mysqli_set_charset($conn, "utf8");
	// Check connection
	if ($conn->connect_error) {
		header("Location: ../../dberr");
		exit();
	}else{
		
		If (@$_GET['lang'] == 'de'){
			setcookie("lang", "de", time()+3600*99999);
		}elseIf (@$_GET['lang'] == 'en'){
			setcookie("lang", "en", time()+3600*99999);
		}elseIf (@$_GET['lang'] == 'cn'){
			setcookie("lang", "cn", time()+3600*99999);
		}elseIf (@$_GET['lang'] == 'in'){
			setcookie("lang", "in", time()+3600*99999);
		}
			
		if(isset($_COOKIE['lang'])){
			if($_COOKIE['lang'] == 'de'){
				$lang = "de";
			}elseif($_COOKIE['lang'] == 'cn'){
				$lang = "cn";
			}elseif($_COOKIE['lang'] == 'in'){
				$lang = "in";
			}else{
				$lang = "en";
			}
		}else{
			$lang = substr(@$_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
			If ($lang == 'de'){
				setcookie("lang", "de", time()+3600*99999);
				$lang = "de";
			}elseif ($lang == 'cn'){
				setcookie("lang", "cn", time()+3600*99999);
				$lang = "cn";
			}elseif ($lang == 'in'){
				setcookie("lang", "in", time()+3600*99999);
				$lang = "in";
			}else{
				setcookie("lang", "en", time()+3600*99999);
				$lang = "en";
			}
		}
		
		require_once("_functions.php");

		
		$_WEBWAER = getset('_WEBWAER');
		$_SITEURL = getset('_SITEURL');
		$_SITETITLE = getset('_SITETITLE');
		$_SITEFOOTER = '&copy; 2019 '.$_SITETITLE.' - by <a href="https://kernstudios.de" target="_blank">KeRnStudios</a>&nbsp;&nbsp;&nbsp;&bull;&nbsp;&nbsp;&nbsp;Version - 1.0.0';
		
		if (isset($_SESSION['id'])){
			$suid = mssql_escape_string($_SESSION['id']);	
			
			$queryisAdm =("SELECT isAdm FROM user WHERE id='$suid' AND isAdm='1'");
			$resultisAdm = $conn->query($queryisAdm); 
			if( $resultisAdm->num_rows == 1) { 
				$UserisAdm = true;
			}else{
				$UserisAdm = false;
			}	
		}else{
			$UserisAdm = false;
		}
		
		require_once(__DIR__ . "/../cronjob.php");
		
		if (isset($_COOKIE['LogUseKeSESS'])) {
			$cookie = mssql_escape_string($_COOKIE['LogUseKeSESS']);
			$query =("SELECT USERID FROM session WHERE HASH='$cookie'");
			$result = $conn->query($query); 
			 if( $result->num_rows == 1) {  
				 $row = $result->fetch_assoc();
				 $_SESSION['user'] = $row['USERID'];
			 }
		}
	} 
}
?>