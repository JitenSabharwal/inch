<?php
########################################
$result=mysqli_query($con,"SELECT * from stg_stage");
$result1=mysqli_query($con,"SELECT * from prj_project");
########################################
$_SESSION['j']=1;
function display()
{
	?>
	<tr>
		<td> <?php echo $_SESSION['j']; ?></td>
		<td><?php echo $_SESSION['pi_name']; ?></td>
		<td><?php echo 'Pi';?></td>
		<td><?php echo $_SESSION['pi'] ;?></td>
	</tr>
	<tr>
		<td> <?php echo $_SESSION['j']+1; ?></td>
		<td><?php echo $_SESSION['pm_name']; ?></td>
		<td><?php echo 'PM';?></td>
		<td><?php echo $_SESSION['pm'] ;?></td>
	</tr>
	<tr>
		<td> <?php echo $_SESSION['j']+2; ?></td>
		<td><?php echo $_SESSION['fs_name']; ?></td>
		<td><?php echo 'Fs';?></td>
		<td><?php echo $_SESSION['fs'] ;?></td>
	</tr>
	
	<?php

$_SESSION['j']+=3;
}
while($row1=mysqli_fetch_array($result1))
{
	if($_REQUEST['pn']==$row1['pr_prname'])
	{
		$_SESSION['pi_name']=$row1['pr_pi'];
		$_SESSION['pm_name']=$row1['pr_pm'];
		$_SESSION['fs_name']=$row1['pr_fs'];
	}
}
while($row=mysqli_fetch_array($result))
{
	if(strcmp($row['st_woid'],$_REQUEST['or'])==0)
	{
		if($row['st_stid']==$_REQUEST['st'])
		{
			$_SESSION['pi']=$row['st_picomment'];
			$_SESSION['pm']=$row['st_pmcomment'];
			$_SESSION['fs']=$row['st_fscomment'];
			display();		
		}
	}
}
?>