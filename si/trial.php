<?php
session_start();
include '../connection.php';
//$a=$_SESSION['fi_fiid'];
//$wo=$_SESSION['or_upload'];

####################################################################################
//	$result=mysqli_query($con,"SELECT * from prj_project , wok_order where pr_prid=wo_prid AND wo_wocid='$wo' group by wo_quoteid");
	####################################################################################
//		while($row=mysqli_fetch_array($result))
		{
//			echo $row['wo_quoteid']."<br>".$row['wo_prid'];
			echo "wokin";
			$_SESSION['b']="1";
			$_SESSION['c']="1";
			$_SESSION['e']="1";
			$_SESSION['d']="1";
			$_SESSION['f']="1";
			//$_SESSION['g']=$targetFile;
			
		}
	$a="5";	
	$b=$_SESSION['b'];
	$c=$_SESSION['c'];
	$d=$_SESSION['d'];
	echo $b;
	echo $c;
	echo $d;
	echo $a;
	$updfile=mysqli_query($con,"INSERT INTO fid_file(fi_fiid,fi_woid) VALUES('$a','$b')");
	if(empty($updfile))
	{
		echo "not";
	}
	else
	{
		$up=mysqli_query($con,"UPDATE fid_file SET fi_woid='1',fi_prid='1',fi_stid='1' where fi_fiid='$a'");
		if(empty($up))
		{
			echo "kid";
		}
	}
	
?>