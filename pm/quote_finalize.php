<?php
session_start();
include 'connection.php';
$_SESSION['quote']=$_REQUEST['quote'];
########################################
$resultw=mysqli_query($con,"SELECT * from wok_order");
$resultp=mysqli_query($con,"SELECT * from  pod_order");
########################################
$com=$_REQUEST['A_comment'];
echo $com;
while ($row=mysqli_fetch_array($resultw))
{
	if(strcmp($row['wo_wocid'],$_REQUEST['or'])==0)
	{
		if(strcmp($_SESSION['quote'],"Quote1")==0)
		{
			$x=$_REQUEST['or'];
			$upw=mysqli_query($con,"UPDATE wok_order SET wo_worate=wo_rateq1,wo_quoteid=wo_quoteid1 WHERE wo_wocid='$x'");
			if(empty($upw))
			{
				echo "error";
			}
			else
			{
				$upc=mysqli_query($con,"UPDATE qu_quote SET qu_pmcomment='$com' WHERE qu_quid=(SELECT wo_quoteid from wok_order WHERE wo_wocid='$x') ");
			}
		}
		else if(strcmp($_SESSION['quote'],"Quote2")==0)
		 {
			$x=$_REQUEST['or'];
			$upw=mysqli_query($con,"UPDATE wok_order SET wo_worate=wo_rateq2,wo_quoteid=wo_quoteid2 WHERE wo_wocid='$x'");	
			if(empty($upw))
			{
				echo "error";
			}
			else
			{
				$upc=mysqli_query($con,"UPDATE qu_quote SET qu_pmcomment='$com' WHERE qu_quid=(SELECT wo_quoteid from wok_order WHERE wo_wocid='$x') ");
			}
		}
		else if(strcmp($_SESSION['quote'],"Quote3")==0)
		{
			$x=$_REQUEST['or'];
			$upw=mysqli_query($con,"UPDATE wok_order SET wo_worate=wo_rateq3,wo_quoteid=wo_quoteid3 WHERE wo_wocid='$x'");
			if(empty($upw))
			{
				echo "error";
			}
			else
			{
				$upc=mysqli_query($con,"UPDATE qu_quote SET qu_pmcomment='$com' WHERE qu_quid=(SELECT wo_quoteid from wok_order WHERE wo_wocid='$x') ");
			}
		}	
	}
	if(empty($upw))
	{

	}
	else
	{			
				echo "working";
				$up_status=mysqli_query($con,"UPDATE orders SET or_status='Wo Create' WHERE or_wopo_cid='$x'");				
	}	
}


while($row=mysqli_fetch_array($resultp))
{
	if(strcmp($row['po_pocid'],$_REQUEST['or'])==0)
	{

		if(strcmp($_SESSION['quote'],"Quote1")==0)
		{
			
			$x=$_REQUEST['or'];
			$upp=mysqli_query($con,"UPDATE pod_order SET po_porate=po_rateq1,po_quoteid=po_quoteid1 WHERE po_pocid='$x'");
			if(empty($upw))
			{
				echo "error";
			}
			else
			{
				$upc=mysqli_query($con,"UPDATE qu_quote SET qu_pmcomment='$com' WHERE qu_quid=(SELECT po_quoteid from pod_order WHERE po_pocid='$x') ");
			}
		}
		else if(strcmp($_SESSION['quote'],"Quote2")==0)
		 {
			$x=$_REQUEST['or'];
 			$upp=mysqli_query($con,"UPDATE pod_order SET po_porate=po_rateq2,po_quoteid=po_quoteid2 WHERE po_pocid='$x'");
			if(empty($upw))
			{
				echo "error";
			}
			else
			{
				$upc=mysqli_query($con,"UPDATE qu_quote SET qu_pmcomment='$com' WHERE qu_quid=(SELECT po_quoteid from pod_order WHERE po_pocid='$x') ");
			}	
		}
		else if(strcmp($_SESSION['quote'],"Quote3")==0)
		{
			$x=$_REQUEST['or'];
			$upp=mysqli_query($con,"UPDATE pod_order SET po_porate=po_rateq3,wo_quoteid=wo_quoteid3 WHERE po_pocid='$x'");			
			if(empty($upw))
			{
				echo "error";
			}
			else
			{
				$upc=mysqli_query($con,"UPDATE qu_quote SET qu_pmcomment='$com' WHERE qu_quid=(SELECT po_quoteid from pod_order WHERE po_pocid='$x') ");
			}
		}	
	}
	if(empty($upp))
	{
		//echo "workingp";

	}
	else
	{
		//echo "workingp";

		$up_status=mysqli_query($con,"UPDATE orders SET or_status='Po Create' WHERE or_wopo_cid='$x'");		
	}
}	

if(strcmp($_SESSION['quote'],"Reject All")==0)
{
	$x=$_REQUEST['or'];
	$up_status=mysqli_query($con,"UPDATE orders SET or_status='Request for quotes' WHERE or_wopo_cid='$x'");
	
}
//header ("location:pm_page.php?op=approval");
?>