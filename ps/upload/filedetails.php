<?php
session_start();
include '../include/connection.php';
$a=$_SESSION['fi_fiid'];
$wo=$_SESSION['or_upload'];

####################################################################################
	$result=mysqli_query($con,"SELECT * from prj_project , wok_order where pr_prid=wo_prid AND wo_wocid='$wo' group by wo_quoteid");
	####################################################################################
		while($row=mysqli_fetch_array($result))
		{
			//echo $row['wo_quoteid']."<br>".$row['wo_prid'];
			//echo "wokin";
			$_SESSION['b']=$row['wo_prid'];
			$_SESSION['c']=$_SESSION['or_upload'];
			$_SESSION['e']=$row['pr_ps'];
			$_SESSION['f']=$row['wo_quoteid'];
			//$_SESSION['g']=$targetFile;
			
		}
	$b=$_SESSION['b'];
	$c=$_SESSION['c'];
	$f=$_SESSION['f'];
	$g=$_SESSION['path'];
	$e=$_SESSION['Employee'];
	$updfile=mysqli_query($con,"INSERT INTO fid_file(fi_fiid,fi_prid,fi_woid,fi_usid,fi_quid,fi_path,fi_edtm) VALUES('$a','$b','$c','$e','$f','$g',CURDATE())");
	
	if(empty($updfile))
	{
		echo "not";
	}
	
?>