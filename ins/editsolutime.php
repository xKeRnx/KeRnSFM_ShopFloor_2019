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
	
	$text = trim($_REQUEST["text"]);
	$text = strip_tags($text);
	$text = htmlspecialchars($text);
	$text = mssql_escape_string($text);
	
	$time = trim($_REQUEST["time"]);
	$time = strip_tags($time);
	$time = htmlspecialchars($time);
	$time = mssql_escape_string($time);
	
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
		$projowner = $row0["owner"];
		$projstatus1 = $row0["status"];
		$projsolution = $row0["solution"];
		
		if($projcreator == $suid AND $projstatus1 != 0 AND $projsolution == NULL OR $projrespo == $suid AND $projstatus1 != 0 AND $projsolution == NULL OR $isAdm == 1 AND $projstatus1 != 0 AND $projsolution == NULL){
			$sql = "UPDATE project_entry SET solveuntil='$time', status='1' WHERE id='$project'";
			$result = $conn->query($sql);
			
			$sql0 = "INSERT INTO project_comment(project, msg, user) VALUES('$project', '$text', '$suid')";
			$result0 = $conn->query($sql0);

			$commmsg = base64_encode('has edit solution Time');
			$sql1 = "INSERT INTO entry_history(entry, message, creator) VALUES('$project', '$commmsg', '$suid')";
			// entry_type -> 0 = escalated / 1 = add solution / 2 = new Solution time / 3 = Problem solved / 
			$sql1 = "INSERT INTO entry_history(entry, message, creator, project_owner, project_creator, entry_type) VALUES('$project', '$commmsg', '$suid', '$projowner', '$projcreator', 2)";
			$result1 = $conn->query($sql1);
			
			if($result AND $result1  AND $result0){
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