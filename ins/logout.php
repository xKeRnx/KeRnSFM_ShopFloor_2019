<?php $__TOKEN = "hardcodeshitbykernstudios"; require_once('../Include/_init.php');

	if (isset($_SESSION['id'])){
		if (isset($_COOKIE['LogUseKeSESS'])) {
			$LogUID = trim(@$_COOKIE['LogUseKeSESS']);
			$LogUID = strip_tags($LogUID);
			$LogUID = htmlspecialchars($LogUID);
			$LogUID = mssql_escape_string($LogUID);

			if (isset($_SERVER['HTTP_COOKIE'])) {
			$cookies = explode(';', $_SERVER['HTTP_COOKIE']);
			foreach($cookies as $cookie) {
				$parts = explode('=', $cookie);
				$name = trim($parts[0]);
				setcookie($name, '', time()-1000);
				setcookie($name, '', time()-1000, '/');
			}
		}
			
			unset($_COOKIE['LogUseKeSESS']);
			setcookie('LogUseKeSESS', null, -1, '/');
		}
		unset($_SESSION['id']);

		echo "ok";
	}

?>