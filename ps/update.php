<?php
include 'connection.php';
##############################
$result=mysqli_query($con,"SELECT * from wok_order");
$result1=mysqli_query($con,"SELECT * from pod_order");
################################
$id=$_REQUEST['or'];
         while($row=mysqli_fetch_array($result))
         {
         	if($row['wo_wocid']==$_REQUEST['or'])
         	{
         		  $up=mysqli_query($con,"UPDATE orders SET or_status='WO Created(PM Approval)' WHERE or_wopo_cid='$id'");
                         
         	}
         }
          while($row=mysqli_fetch_array($result1))
         {
         	if($row['po_pocid']==$_REQUEST['or'])
         	{
         		  $up=mysqli_query($con,"UPDATE orders SET or_status='PO Created(PM Approval)' WHERE or_wopo_cid='$id'");
       
         	}
         }
        

?>