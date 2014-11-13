<table border=2 width=700>
	<th>S.no</th>
	<th>Quote</th>
	<th>Vendor Name</th>
	<th>Vendor Contact</th>
	
<?php
$_SESSION['x']=1;
function display_quote()
{
?>
	<tr>
			<td><?php echo $_SESSION['x'];?></td>
			<td><?php echo $_SESSION['quote_id'];?></td>
			<td><?php echo $_SESSION['name'];?></td>
			<td><?php echo $_SESSION['contact'];?></td>

	</tr>
<?php
$_SESSION['x']++;
}
##############################################################################################
$result1=mysqli_query($con,"SELECT * from wok_order group by wo_wocid");
$result2=mysqli_query($con,"SELECT * from pod_order group by po_pocid");
$result3=mysqli_query($con,"SELECT * from qut_quote a,ven_vendor b WHERE a.qu_venid=b.ve_veid ");
##############################################################################################

while($row1=mysqli_fetch_array($result1))
{
	//echo $row1['wo_wocid']."||".$row1['wo_prid']."||".$row1['wo_quoteid']."<br>";
	if($row1['wo_wocid']==$_REQUEST['or'])
	{
		while($row2=mysqli_fetch_array($result3))
		{
			if($row1['wo_quoteid']==$row2['qu_quid'])
			{
				$_SESSION['quote_id']=$row2['qu_quid'];
				$_SESSION['name']=$row2['ve_vname'];;
				$_SESSION['contact']=$row2['ve_contact1'];
				display_quote();
			}
		}
	}
}
while($row1=mysqli_fetch_array($result2))
{
	//echo $row1['wo_wocid']."||".$row1['wo_prid']."||".$row1['wo_quoteid']."<br>";
	if($row1['po_pocid']==$_REQUEST['or'])
	{
		while($row2=mysqli_fetch_array($result3))
		{
			if($row1['po_quoteid']==$row2['qu_quid'])
			{
				$_SESSION['quote_id']=$row2['qu_quid'];
				$_SESSION['name']=$row2['ve_vname'];;
				$_SESSION['contact']=$row2['ve_contact1'];
				display_quote();
			}
		}
	}
}

?>
</table>
<br>
<br>