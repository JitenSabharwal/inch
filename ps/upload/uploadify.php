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

	$inserto=mysqli_query($con,"UPDATE orders SET or_status='Site Survey' where or_wopo_cid='$ido'");
	//$inserts=mysqli_query($con,"UPDATE stg_status SET st_status='PI' where st_stageid='$id'");
	include 'filedetails.php';
	//$updfile=mysqli_query($con,"INSERT INTO fid_file(fi_fiid,fi_prid,fi_woid,fi_stid,fi_usid,fi_quid,fi_path,fi_edtm) VALUES('$a','$b','$c','$d','$e','$f','$g',CURDATE())");

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