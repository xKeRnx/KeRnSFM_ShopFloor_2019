<?php $__TOKEN = "hardcodeshitbykernstudios"; require_once(__DIR__ . '/../../Include/_init.php'); 

if (isset($_SESSION['id']) AND $UserisAdm == true AND isset($_REQUEST["newquename"])){
	$newquename = $_REQUEST["newquename"];
	$newquename = mssql_escape_string($newquename);
	
	$sql = "INSERT INTO types(names) VALUES('$newquename')";
	$result = $conn->query($sql);
		
	if($result){
		echo 'OK';			
	}else{
		echo 'error';
	}
}else{
	echo "error";
}
?>