<?php
include 'connection.php';
$wo=$_REQUEST['or'];
$com=$_REQUEST['St_comment'];
$st=$_REQUEST['st'];
$in=mysqli_query($con,"UPDATE stg_stage SET st_picomment='$com' WHERE st_stid='$st'");
if(empty($in))
{
	echo "ERROR";
}
else
{
	$or=mysqli_query($con,"UPDATE orders SET or_status='Check for stages' WHERE or_wopo_cid='$wo'");
	if(empty($or))
	{
		echo "error";
	}
}
?>