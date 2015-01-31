<?php
session_start();
include '../include/connection.php';
//echo "working";
#####################################
$result=mysqli_query($con,"SELECT * from stg_stage");
$result1=mysqli_query($con,"SELECT * from orders");
$result2=mysqli_query($con,"SELECT * from wok_order");
$result3=mysqli_query($con,"SELECT * from pod_order");
#####################################

$id=$_REQUEST['or'];
if(@$_REQUEST['Approvalwopo']=="Approve")
{
	while($row1=mysqli_fetch_array($result2))
	{	
		if($row1['wo_wocid']==$_REQUEST['or'])
			{
				$up=mysqli_query($con,"UPDATE orders SET or_status='WO(FS check for funds)' WHERE or_wopo_cid='$id'");
			}

	}
	while($row1=mysqli_fetch_array($result3))
	{	
		if($row1['po_pocid']==$_REQUEST['or'])
			{
				$up=mysqli_query($con,"UPDATE orders SET or_status='PO(FS check for funds)' WHERE or_wopo_cid='$id'");
			}

	}
echo "<script>alert('Tables Updated');</script>";
			
}
else if(@$_REQUEST['Rejectwopo']=="Reject")
{
	while($row1=mysqli_fetch_array($result2))
	{	
		if($row1['wo_wocid']==$_REQUEST['or'])
			{
				$up=mysqli_query($con,"UPDATE orders SET or_status='Wo Create' WHERE or_wopo_cid='$id'");
			}

	}
	while($row1=mysqli_fetch_array($result3))
	{	
		if($row1['po_pocid']==$_REQUEST['or'])
			{
				$up=mysqli_query($con,"UPDATE orders SET or_status='PO Create' WHERE or_wopo_cid='$id'");
			}

	}
echo "<script>alert('Tables Updated');</script>";
	
}
header("location:pm_page.php?op=approval&search=click");
?>