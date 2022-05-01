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
	
	$filename = $_FILES["file"]["name"];
	$file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
	$file_ext = substr($filename, strripos($filename, '.')); // get file name
	$filesize = $_FILES["file"]["size"];
	$allowed_file_types = array('.csv');	

	if (in_array($file_ext,$allowed_file_types) && ($filesize < 200000))
	{	
		// Rename file
		$newfilename = $project.$file_ext;		
			move_uploaded_file($_FILES["file"]["tmp_name"], "C:/inetpub/wwwKeRnStudios.de_SubDomains/wwwManagement/csv/".$newfilename);
			echo "File uploaded successfully.";		
	}
	elseif (empty($file_basename))
	{	
		// file selection error
		echo "Please select a file to upload.";
	} 
	elseif ($filesize > 200000)
	{	
		// file size error
		echo "The file you are trying to upload is too large.";
	}
	else
	{
		// file type error
		echo "Only these file typs are allowed for upload: " . implode(', ',$allowed_file_types);
		unlink($_FILES["file"]["tmp_name"]);
	}
}else{
	echo "error";
}
?>