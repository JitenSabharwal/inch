<table border=1 width=700>
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
			<td><a href="si_page.php?op=<?php echo $_REQUEST['op']; ?>&search=click&or=<?php echo $_SESSION['order'];?>&po=click&st=<?php echo $_SESSION['st_stid'];?>&st_click=click&pn=<?php echo $_SESSION['project_name'];?>"></a></td>
			<td><?php echo $_SESSION['desc'];?></td>
			<td><?php echo $_SESSION['rate'];?></td>
		</tr>
<?php
}
###############################################################################
$result=mysqli_query($con,"SELECT * from stg_stage a,stg_status b WHERE b.st_stageid=a.st_stid");
###############################################################################
while($row=mysqli_fetch_array($result))
{
	if($row['st_woid']==$_REQUEST['or'])
	{
		if($row['st_status']=='SI')
		{
			$_SESSION['desc']=$row['st_stdesc'];
			$_SESSION['st_stid']=$row['st_stid'];
			$_SESSION['rate']=$row['st_strate'];
			display_stage();
		}
	}
}
?>
</table>
<br>
<br>

