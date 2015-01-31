<?php
include '../include/connection.php';
$a=$_SESSION['fi_fiid'];
$wo=$_SESSION['or_upload'];

####################################################################################
	$result=mysqli_query($con,"SELECT * from prj_project , wok_order where pr_prid=wo_prid AND wo_wocid='$wo' group by wo_quoteid");
	####################################################################################
		while($row=mysqli_fetch_array($result))
		{	

			$_SESSION['b']=$row['wo_prid'];
			$_SESSION['c']=$_SESSION['or_upload'];
			$_SESSION['e']=$row['pr_si'];
			$_SESSION['d']=$_SESSION['st_upload'];
			$_SESSION['f']=$row['wo_quoteid'];
		//	echo $row['wo_quoteid'];
			//$_SESSION['g']=$targetFile;		
		}
        mysqli_data_seek($result,0);

	$b=$_SESSION['b'];
	$c=$_SESSION['c'];
	$d=$_SESSION['d'];
	$e=$_SESSION['Employee'];
	$f=$_SESSION['f'];
	//echo $f;
	$g=$_SESSION['path'];
	$updfile=mysqli_query($con,"INSERT INTO fid_file(fi_fiid,fi_prid,fi_woid,fi_stid,fi_usid,fi_quid,fi_path,fi_edtm) VALUES('$a','$b','$c','$d','$e','$f','$g',CURDATE())");
	if(empty($updfile))
	{
		echo "not";
	}
	
?>