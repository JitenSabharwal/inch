<?php
include 'connection.php';
$wo=$_REQUEST['or'];
$com=$_REQUEST['St_comment'];

$in=mysqli_query($con ,"UPDATE stg_stage SET st_picomment='$com' WHERE st_woid='$wo'");
if(empty($in))
{
	echo "ERROR";
}
else
{
	$or=mysqli_query($con,"UPDATE orders SET or_status='Site Survey(PM)' WHERE or_wopo_cid='$wo'");
	if(empty($or))
	{
		echo "error";
	}
}

?>