<?php $__TOKEN = "hardcodeshitbykernstudios"; require_once(__DIR__ . '/../../Include/_init.php'); 

if (isset($_SESSION['id']) AND $UserisAdm == true AND isset($_REQUEST["newprobtype"])){
	$newprobtype = $_REQUEST["newprobtype"];
	$newprobtype = mssql_escape_string($newprobtype);
	
	$sql = "INSERT INTO problem_type(name) VALUES('$newprobtype')";
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