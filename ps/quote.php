<?php
include '../include/connection.php';
include 'idgenerator.php';

//#################################
$result1=mysqli_query($con,"SELECT * from wok_order");
$result2=mysqli_query($con,"SELECT * from pod_order");
//#################################
$prid=$_SESSION['prid'];
$quid=$_SESSION['qu_id'];
//echo $quid;
$vid=$_SESSION['vid'];
$name=$_REQUEST['vendor_name'];
//echo $name;
$contact=$_REQUEST['contact_no'];

//echo $contact;
//$amount=0;
//echo $vid;
$i=1;
while($row=mysqli_fetch_array($result1) )	
{
	if($i<$_SESSION['j'])
	{
		//echo "working";
		if(strcmp($_REQUEST['or'],$row['wo_wocid'])==0)
		{
			$r=$_REQUEST['rate'.$i];
		//echo $r;
		$x=$row['wo_woid'];
		//echo $x;
		if(strcmp($_REQUEST['quote'],'1')==0)
		{
			//echo "working";
		$in=mysqli_query($con,"UPDATE  wok_order SET wo_rateq1 ='$r',wo_quoteid1='$quid' WHERE wo_woid='$x' ");
			$i++;
		}
		elseif(strcmp($_REQUEST['quote'],'2')==0)
		{
			//echo "working";
			$in=mysqli_query($con,"UPDATE  wok_order SET wo_rateq2='$r',wo_quoteid2='$quid' WHERE wo_woid= '$x' ");
			$i++;
		}
		else//if(strcmp($_REQUEST['quote'],'3')==0)
		{
			//echo "working";
			$in=mysqli_query($con,"UPDATE  wok_order SET wo_rateq3 ='$r',wo_quoteid3='$quid'  WHERE wo_woid= '$x' ");
			$status="Review the quotes";
			$id=$row['wo_wocid'];
			$up=mysqli_query($con,"UPDATE orders SET or_status='$status' WHERE or_wopo_cid='$id'");
			$i++;

		}

		}
	}	
	
	
}

$i=1;
while($row=mysqli_fetch_array($result2))
{
	
	if($i<$_SESSION['j'])
	{
		if(strcmp($_REQUEST['or'],$row['po_pocid'])==0)
		{
			$r=$_REQUEST['rate'.$i];			
			$x=$row['po_poid'];
			if(strcmp($_REQUEST['quote'],'1')==0)
			{
				$in=mysqli_query($con,"UPDATE pod_order SET po_rateq1='$r',po_quoteid1='$quid' WHERE po_poid= '$x'");
				$i++;
			}
			elseif(strcmp($_REQUEST['quote'],'2')==0)
			{
				$in=mysqli_query($con,"UPDATE pod_order SET po_rateq2='$r',po_quoteid2='$quid' WHERE po_poid= '$x'");
				$i++;
			}
			elseif(strcmp($_REQUEST['quote'],'3')==0)
			{
				$in=mysqli_query($con,"UPDATE pod_order SET po_rateq3='$r',po_quoteid3='$quid' WHERE po_poid= '$x'");
				$i++;
				$status="Review the quotes";
				$id=$row['po_pocid'];
				$up=mysqli_query($con,"UPDATE orders SET or_status='$status' WHERE or_wopo_cid='$id'");
				
			}
		}
	}
	
	
}//echo $amount;
if(strcmp($_REQUEST['quote'],'3')==0)
{
	//include '../files/filetrial.php';
}
$in=mysqli_query($con,"INSERT INTO qut_quote(qu_quid,qu_prid,qu_venid) VALUES('$quid','$prid','$vid')");

if(empty($in))
{
	echo "failed";
}
$vn=mysqli_query($con,"INSERT INTO ven_vendor(ve_veid,ve_vname,ve_contact1) VALUES('$vid','$name','$contact')");
if(empty($vn))
{
	echo "failed";
}
?>
