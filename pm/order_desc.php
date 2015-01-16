<br>
<br>

<table width="800" class="table table-hover tab-border">
    <tr>
      <td>Project Name </td>
      <td>Description</td>
      <td>Quantity</td>
      <td>Rate</td>
      <td>Total</td>
          </tr>
 
<?php

function displayq()
{
?>	
		<tr>
		<td><?php echo $_REQUEST['pn']; ?></td>
		<td><?php echo $_SESSION['desc'];?></td>
		<td><?php echo $_SESSION['quan'];?></td>
		<td><?php echo $_SESSION['q'];?></td>
      	<td><?php echo $_SESSION['q']*$_SESSION['quan'];?></td>
		
		</tr>

<?php
}
#########################
$result1=mysqli_query($con,"SELECT * from wok_order ");
$result2=mysqli_query($con,"SELECT * from pod_order ");
$result3=mysqli_query($con,"SELECT * from orders");
$result4=mysqli_query($con,"SELECT * from prj_project");

#########################
while($row=mysqli_fetch_array($result3))
{
	if(strcmp($row['or_prjname'],$_REQUEST['pn'])==0)
	{
		$_SESSION['prid']=$row['or_prid'];
	}
}
while($row=mysqli_fetch_array($result1))
{
	if(strcmp($row['wo_wocid'],$_REQUEST['or'])==0)
	{
		$_SESSION['desc']=$row['wo_wodesc'];
		$_SESSION['quan']=$row['wo_woquantity'];
		$_SESSION['q']=$row['wo_worate'];
		$_SESSION['id']=$row['wo_quoteid'];
		displayq();
	}
}
while($row=mysqli_fetch_array($result2))
{
	if(strcmp($row['po_pocid'],$_REQUEST['or'])==0)
	{
		$_SESSION['desc']=$row['po_podesc'];
		$_SESSION['quan']=$row['po_poquantity'];
		$_SESSION['q']=$row['po_porate'];
		$_SESSION['id']=$row['po_quoteid'];		
		displayq();
	}		
}
?>
</table>
<br>
<br>
