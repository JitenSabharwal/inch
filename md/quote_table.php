<?php
//session_start(order);
?>
<table border=2 width=700>
	<th>S.no</th>
	<th>Description</th>
	<th>Quantity</th>
	<th>Rate</th>
	<th>Total</th>



</table>

<?php
$_SESSION['x']=1;
function display_quote()
{
?>
	<tr>
			<td><?php echo $_SESSION['x'];?></td>
			<td><?php echo $_SESSION[''];?></td>
			<td><?php echo $_SESSION[''];?></td>
			<td><?php echo $_SESSION[''];?></td>

	</tr>
<?php
}
##############################################################################################
$result1=mysqli_query($con,"SELECT * from wok_order group by wo_wocid");
$result2=mysqli_query($con,"SELECT * from pod_order group by po_pocid");
$result3=mysqli_query($con,"SELECT * from qu_quote  INNER JOIN ven_vendor  on qu_venid=ve_venid ");
##############################################################################################

while($row1=mysqli_fetch_array($result1))
{
	//echo $row1['wo_wocid']."||".$row1['wo_prid']."||".$row1['wo_quoteid']."<br>";
	if($row1['wo_wocid']==$_REQUEST['or'])
	{
		while($row2=mysqli_fetch_array($result3))
		{
			if($row1['wo_quoteid']==$row2['qu_qid'])
			{

				echo $row2['q.qu_venid'];
				//$_SESSION['quote_id'];//=$row2['qu_quid'];
				//$_SESSION['']=$row2[''];
				//$_SESSION['']=$row2[''];

			}
		}
	}
}
?>
<?php
//session_destroy(order);
?>