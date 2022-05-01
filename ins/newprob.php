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
	
	$text = trim($_REQUEST["text"]);
	$text = strip_tags($text);
	$text = htmlspecialchars($text);
	$text = mssql_escape_string($text);
	
	$title = trim($_REQUEST["title"]);
	$title = strip_tags($title);
	$title = htmlspecialchars($title);
	$title = mssql_escape_string($title);
	
	$asign = trim($_REQUEST["asign"]);
	$asign = strip_tags($asign);
	$asign = htmlspecialchars($asign);
	$asign = mssql_escape_string($asign);
	
	$probtyp = trim($_REQUEST["probtyp"]);
	$probtyp = strip_tags($probtyp);
	$probtyp = htmlspecialchars($probtyp);
	$probtyp = mssql_escape_string($probtyp);
	
	$sql0 = "SELECT * FROM project WHERE id='$project'";
	$result0 = $conn->query($sql0);
	
	$solveuntil = date('Y-m-d H:i:s', strtotime("+3 days"));;

	if ($result0->num_rows == 1) {
		
		$sql = "INSERT INTO project_entry(project, info, descri, owner, creator, status, solveuntil, type) VALUES('$project', '$title', '$text', '$asign', '$suid', '2', '$solveuntil', '$probtyp')";
		$result = $conn->query($sql);
		
				$commmsg = base64_encode('has opened Problem');
				// entry_type -> 0 = escalated / 1 = add solution / 2 = new Solution time / 3 = Problem solved / 4 = Problem opened
				$sql1 = "INSERT INTO entry_history(entry, message, creator, project_owner, project_creator, entry_type) VALUES('$project', '$commmsg', '$suid', '$asign', '$suid', 4)";
				$result1 = $conn->query($sql1);
				
				if($result AND $result1){
					echo 'OK';			
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