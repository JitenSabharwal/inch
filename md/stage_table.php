<table class="table tab-border" width=700>
<tr>
	<th>Stage Id</th>
	<th>Description</th>
	<th>Percentage</th>
</tr>
<?php
function display_stage()
{
?>
		<tr>
			<td><?php echo $_SESSION['st_stid'];?></td>
			<td><?php echo $_SESSION['desc'];?></td>
			<td><?php echo $_SESSION['rate'];?></td>
		</tr>
<?php
}
###############################################################################
$result=mysqli_query($con,"SELECT * from stg_stage ");
###############################################################################
while($row=mysqli_fetch_array($result))
{
	if($row['st_woid']==$_REQUEST['or'])
	{
		$_SESSION['desc']=$row['st_stdesc'];
		$_SESSION['st_stid']=$row['st_stid'];
		$_SESSION['rate']=$row['st_strate'];
		display_stage();
	}
}
?>
</table>
<br>
<br>