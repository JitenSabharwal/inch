<?php
#####################################################
$result=mysqli_query($con,"SELECT * from wok_order");
$result1=mysqli_query($con,"SELECT * from pod_order");
#####################################################

$_SESSION['pname']=$_REQUEST['pn'];
$cid=$_REQUEST['or'];
$mdcom=$_REQUEST['MD_comment'];

while($row=mysqli_fetch_array($result))
{
	if(strcmp($row['wo_wocid'],$_REQUEST['or'])==0)
	{
		$id=$row['wo_woid'];
		$upa=mysqli_query($con,"UPDATE wok_order SET wo_mdcomment='$mdcom',wo_approval='no' WHERE wo_woid='$id'");
		if(!empty($upa))
		{			
			$upo=mysqli_query($con,"UPDATE orders SET or_status='Request for quotes' WHERE or_wopo_cid='$cid'");
			$msg = wordwrap($mdcom,70);
			$head='From:noreply@auricktech.com';
// send email
			mail("garvit1608@gmail.com","MD Comment",$msg,$head);
		}
	
	}	
}

while($row=mysqli_fetch_array($result1))
{
	if(strcmp($row['po_pocid'],$_REQUEST['or'])==0)
	{
		$id=$row['po_poid'];
		$upa=mysqli_query($con,"UPDATE pod_order SET po_mdcomment='$mdcom',po_approval='no' WHERE po_poid='$id'");
		
		if(!empty($upa))
		{
			
			$upo=mysqli_query($con,"UPDATE orders SET or_status='Request for quotes' WHERE or_wopo_cid='$cid'");
			$msg = wordwrap($mdcom,70);
			$head='From:noreply@auricktech.com';
// send email
			mail("garvit1608@gmail.com","MD Comment",$msg,$head);

		}
	
	}	
}
//header('location:md_page.php?op=approval');
?>