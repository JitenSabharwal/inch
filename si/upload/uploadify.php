<?php
session_start();
include '../connection.php';
/*
Uploadify
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
Released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
*/

// Define a destination
$targetFolder = 'uploads/'; // Relative to the root
mkdir($targetFolder.$_SESSION['pr_upload'],0777,true);
mkdir($targetFolder. '/'.$_SESSION['pr_upload']. '/' .$_SESSION['or_upload'],0777,true);
mkdir($targetFolder.'/'.$_SESSION['pr_upload']. '/' .$_SESSION['or_upload']. '/' .$_SESSION['st_upload'],0777,true);



$verifyToken = md5('unique_salt' . $_POST['timestamp']);

if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath =  $targetFolder.$_SESSION['pr_upload']. '/' . $_SESSION['or_upload']. '/' . $_SESSION['st_upload'];
	$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['Filedata']['name'];
	
	// Validate the file type
	$fileTypes = array('jpg','jpeg','gif','png','pdf','doc','docx','txt'); // File extensions
	$fileParts = pathinfo($_FILES['Filedata']['name']);
	
	if (in_array($fileParts['extension'],$fileTypes)) {
		move_uploaded_file($tempFile,$targetFile);
		echo '1';
	$id=$_SESSION['st_upload'];	
	$ido=$_SESSION['or_upload'];
	$inserto=mysqli_query($con,"UPDATE orders SET or_status='Site Survey' where or_wopo_cid='$ido'");
	$inserts=mysqli_query($con,"UPDATE stg_status SET st_status='PI' where st_stageid='$id'");
	} else {
		echo 'Invalid file type.';
	}

}

?>