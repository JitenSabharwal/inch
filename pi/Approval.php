<?php

$wo=$_REQUEST['or'];
$com=$_REQUEST['St_comment'];
$st=$_REQUEST['st'];

$in=mysqli_query($con ,"UPDATE stg_stage SET st_picomment='$com' WHERE st_stid='$st'");
if(empty($in))
{
	echo "ERROR";
}
else
{
	$or=mysqli_query($con,"UPDATE stg_status SET st_status='PM' WHERE st_stageid='$st'");
	$msg = wordwrap($com,70);
$head='From:noreply@auricktech.com';
// send email
mail("garvit1608@gmail.com","PI Comment",$msg,$head);

	if(empty($or))
	{
		echo "error";
	}
}

?>