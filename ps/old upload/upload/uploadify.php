<?php
session_start();
include '../connection.php';
include 'idgen.php';
	//	echo "wokin";

/*
Uploadify
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
Released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
*/

// Define a destination
$targetFolder = 'uploads/'; // Relative to the root
				if(!is_dir($targetFolder.$_SESSION['pr_upload']))
					mkdir($targetFolder.$_SESSION['pr_upload'],0777,true);
				if(!is_dir($targetFolder. '/'.$_SESSION['pr_upload']. '/' .$_SESSION['or_upload']))
					mkdir($targetFolder. '/'.$_SESSION['pr_upload']. '/' .$_SESSION['or_upload'],0777,true);
				
$targetPath =  $targetFolder.$_SESSION['pr_upload']. '/' . $_SESSION['or_upload'];
if(count(glob($targetPath.'/'.'*'))<6)
{
	

$verifyToken = md5('unique_salt' . $_POST['timestamp']);

if (!empty($_FILES) && $_POST['token'] == $verifyToken) {

	$tempFile = $_FILES['Filedata']['tmp_name'];
		
	// Validate the file type
	$fileTypes = array('jpg','jpeg','gif','png','pdf','doc','docx','txt','rtf'); // File extensions
	$fileParts = pathinfo($_FILES['Filedata']['name']);

	$temp=explode('.',$_FILES['Filedata']['name']);
	$temp[0]=$id_no;
	$targetFile = rtrim($targetPath,'/') . '/' .$temp[0].'.'.$temp[1];
	if (in_array($fileParts['extension'],$fileTypes)) {
		move_uploaded_file($tempFile,$targetFile);
		echo   $_FILES['Filedata']['name'].' Upload Successfull';

																	//	$id=$_SESSION['st_upload'];	
																		$ido=$_SESSION['or_upload'];

	}
	 else {
		echo 'Invalid file type.';
	}

}
		}

else
	echo "Only 5 files are allowed for this stage ID";


if(empty($updfile))
			{
				echo "<script>alert('file table not updated');</script>";
			}

?>