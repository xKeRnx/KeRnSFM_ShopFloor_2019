<?php $__TOKEN = "hardcodeshitbykernstudios"; require_once('../Include/_init.php');

if (isset($_SESSION['id'])){
	$suid = trim($_SESSION['id']);
	$suid = strip_tags($suid);
	$suid = htmlspecialchars($suid);
	$suid = mssql_escape_string($suid);	
	
	$project = trim($_REQUEST["project"]);
	$project = strip_tags($project);
	$project = htmlspecialchars($project);
	$project = mssql_escape_string($project);
	
	$procid = trim($_REQUEST["procid"]);
	$procid = strip_tags($procid);
	$procid = htmlspecialchars($procid);
	$procid = mssql_escape_string($procid);
	
	$assignid = trim($_REQUEST["assignid"]);
	$assignid = strip_tags($assignid);
	$assignid = htmlspecialchars($assignid);
	$assignid = mssql_escape_string($assignid);
	
	$isAdmsql = "SELECT Department, FName, LName, isAdm FROM user WHERE id='$suid'";
	$isAdmresult = $conn->query($isAdmsql);

	$isAdm = 0;
	if ($isAdmresult->num_rows == 1) {
		$isAdmrow = $isAdmresult->fetch_assoc();
		if($isAdmrow["isAdm"] == 1){
			$isAdm = 1;
		}
	}
	
	$sql0 = "SELECT * FROM project_entry WHERE id='$project'";
	$result0 = $conn->query($sql0);

	if ($result0->num_rows == 1) {
		$row0 = $result0->fetch_assoc();
		$projrespo = $row0["owner"];
		$projcreator = $row0["creator"];
		$projstatus1 = $row0["status"];
		$projsolution = $row0["solution"];
		
		if($projcreator == $suid AND $projstatus1 != 0 AND $projsolution == NULL OR $projrespo == $suid AND $projstatus1 != 0 AND $projsolution == NULL OR $isAdm == 1 AND $projstatus1 != 0 AND $projsolution == NULL){
			
		$aselsql0 = "SELECT FName, LName FROM user where id='$assignid'";
		$aselres0 = $conn->query($aselsql0);
		if ($aselres0->num_rows > 0) {
			$aselrow0 = $aselres0->fetch_assoc();
			$assignname = $aselrow0["FName"].' '.$aselrow0["LName"];
		}
			
			$sql = "UPDATE project_entry SET owner='$assignid' WHERE id='$project'";
			$result = $conn->query($sql);
			

			$commmsg = base64_encode('has assigned '.$assignname);
			$sql1 = "INSERT INTO entry_history(entry, message, creator) VALUES('$project', '$commmsg', '$suid')";
			$result1 = $conn->query($sql1);
			
			if($result AND $result1){
				echo 'OK';			
			}else{
				echo 'error';
			}
		}else{
			echo 'error';
		}
		
	}else{
		echo "error";
	}
}else{
	echo "error";
}
?>