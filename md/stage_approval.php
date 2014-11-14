<?php
include 'connection.php';
$wo=$_REQUEST['or'];
$com=$_REQUEST['St_comment'];
$st=$_REQUEST['st'];
$in=mysqli_query($con,"UPDATE stg_stage SET st_mdcomment='$com' WHERE st_woid='$st'");
if(empty($in))
{
	echo "ERROR";
}
else
{
	$or=mysqli_query($con,"UPDATE stg_status SET st_status='Contractor' WHERE st_stageid='$st'");
	if(empty($or))
	{
		echo "error";
	}
}

?>