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
	
	$sql0 = "SELECT * FROM project WHERE id='$procid'";
	$result0 = $conn->query($sql0);

	if ($result0->num_rows == 1) {
		$sql = "INSERT INTO project_comment(project, msg, user) VALUES('$project', '$text', '$suid')";
		$result = $conn->query($sql);

		$commmsg = base64_encode('has add Comment');
		// entry_type -> 0 = escalated / 1 = add solution / 2 = new Solution time / 3 = Problem solved / 4 = New comment
		$sql1 = "INSERT INTO entry_history(entry, message, creator, entry_type) VALUES('$project', '$commmsg', '$suid', 4)";
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