<?php

$wo=$_REQUEST['or'];
$com=$_REQUEST['St_comment'];
$st=$_REQUEST['st'];
$prname=$_REQUEST['pn'];
$in=mysqli_query($con,"UPDATE stg_stage SET st_pscomment='$com' WHERE st_stid='$st'");
if(empty($in))
{
	echo "ERROR";
}
else
{
	$or=mysqli_query($con,"UPDATE stg_status SET st_status='SI' WHERE st_stageid='$st'");
	if(empty($or))
	{
		echo "error";
	}
	else
	{
		$f=$_SESSION['filename'];
		$del=mysqli_query($con,"DELETE from fid_file where fi_stid='$st'");
									$msg = wordwrap($com,70);
											      	$head='From:noreply@auricktech.com';
											// send email
											      mail("garvit1608@gmail.com","Ps Comment",$msg,$head);
											      include '../include/file_detail.php';
	}
}
?>