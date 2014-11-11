<h4>Comments</h4>
<table border=1 width=700>
	<tr>
		<th>Name</th>
		<th>Designation</th>
		<th>Comment</th>
	</tr>
<?php

function display_comment()
{
	?>
		<tr>
			<td><?php echo $_SESSION['name']; ?></td>
			<td><?php echo $_SESSION['desig']; ?></td>
			<td><?php echo $_SESSION['fscom']; ?></td>
		</tr>
	<?php
}
#################################################
$resultcw=mysqli_query($con,"SELECT * from wok_order group by wo_wocid");
$resultcp=mysqli_query($con,"SELECT * from pod_order group by po_pocid");
$resultp=mysqli_query($con,"SELECT * from prj_project");
#################################################
while($rowc=mysqli_fetch_array($resultcw))
{
	if($rowc['wo_wocid']==$_REQUEST['or'])
	 {
	 	$_SESSION['fscom']=$rowc['wo_fscomment'];
	 	$_SESSION['desig']='FS';
	 	while($rowp=mysqli_fetch_array($resultp))
	 	{
	 		if($rowp['pr_prname']==$_REQUEST['pn'])
	 		{
	 			$_SESSION['name']=$rowp['pr_fs'];	
	 		}
	 	}
	 	display_comment();
	  }
}
while($rowc=mysqli_fetch_array($resultcp))
{
	if($rowc['po_pocid']==$_REQUEST['or'])
	 {
	 	$_SESSION['fscom']=$rowc['po_fscomment'];
	 	$_SESSION['desig']='FS';
	 	while($rowp=mysqli_fetch_array($resultp))
	 	{
	 		if($rowp['pr_prname']==$_REQUEST['pn'])
	 		{
	 			$_SESSION['name']=$rowp['pr_fs'];	
	 		}
	 	}
	 	display_comment();
	  }
}
?>
</table>
<br>
<br>