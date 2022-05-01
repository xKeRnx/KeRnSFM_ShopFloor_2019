<?php 
$__TOKEN = "hardcodeshitbykernstudios"; 
require_once('Include/_init.php'); 
		$query00 =("SELECT * FROM project_entry WHERE solveuntil< NOW() AND status!='0' AND status!='3'");
		$result00 = $conn->query($query00); 
		if( $result00->num_rows >= 1) {  
			$row00 = $result00->fetch_assoc();
			$row00id = $row00["id"];
			$row00proj = $row00["project"];
			$row00owner = $row00["owner"];
			$row00creator = $row00["creator"];
			$sql00 = "UPDATE project_entry SET status='3' WHERE id='$row00id'";
			if ($conn->query($sql00)){
				$sqlmsg00 = base64_encode('has changed Status');
				// entry_type -> 0 = escalated / 1 = add solution / 2 = new Problem / 3 = Problem solved
				$sql01 = "INSERT INTO entry_history(entry, message, creator, project_owner, project_creator, entry_type) VALUES('$row00id', '$sqlmsg00', '0', '$row00owner', '$row00creator', 0)";
				$result01 = $conn->query($sql01);
				if($result01){

				}
			}
		}
?>