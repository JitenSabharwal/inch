<?php
$result=mysqli_query($con,"SELECT * from wok_order");
$result1=mysqli_query($con,"SELECT * from pod_order");
$_SESSION['pname']=$_REQUEST['pn'];
$cid=$_REQUEST['or'];
$fscom=$_REQUEST['FS_comment'];
while($row=mysqli_fetch_array($result))
{
	if(strcmp($row['wo_wocid'],$_REQUEST['or'])==0)
	{
		$id=$row['wo_woid'];
		$upa=mysqli_query($con,"UPDATE wok_order SET wo_fscomment='$fscom' WHERE wo_woid='$id'");
		if(!empty($upa))
		{			
			$upo=mysqli_query($con,"UPDATE orders SET or_status='WO(MD Approval)' WHERE or_wopo_cid='$cid'");
			$msg = wordwrap($fscom,70);
$head='From:noreply@auricktech.com';
// send email
mail("garvit1608@gmail.com","FS Comment",$msg,$head);

		}
	
	}	
}
while($row=mysqli_fetch_array($result1))
{
	if(strcmp($row['po_pocid'],$_REQUEST['or'])==0)
	{
		$id=$row['po_poid'];
		$upa=mysqli_query($con,"UPDATE pod_order SET po_fscomment='$fscom' WHERE po_poid='$id'");
		if(!empty($upa))
		{
			$upo=mysqli_query($con,"UPDATE orders SET or_status='PO(MD Approval)' WHERE or_wopo_cid='$cid'");
			$msg = wordwrap($fscom,70);
$head='From:noreply@auricktech.com';
// send email
mail("garvit1608@gmail.com","PM Comment",$msg,$head);

		}
	
	}	
}
?>