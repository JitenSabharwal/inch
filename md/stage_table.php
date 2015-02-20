<table class="table tab-border" width=700>
<tr>
	<td>Stage Id</td>
	<td>Description</td>
	<td>Percentage</td>
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
$value=0;
###############################################################################
while($row=mysqli_fetch_array($result))
{
	if($row['st_woid']==$_REQUEST['or'])
	{
		$value=1;
		$_SESSION['desc']=$row['st_stdesc'];
		$_SESSION['st_stid']=$row['st_stid'];
		$_SESSION['rate']=$row['st_strate'];
		display_stage();
	}
}
if($value==0)
	{
  ?>
  <tr>
      <td colspan="3" align="center" >No &nbsp; Results </td>
  </tr>
  <?php
	}

?>
</table>
<br>
<br>