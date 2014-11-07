<?php
########################################
$result=mysqli_query($con,"SELECT * from stg_stage");
########################################
$_SESSION['j']=1;
function display()
{
	?>
	<tr>
		<td> <?php echo $_SESSION['j']; ?></td>
		<td><?php echo 'Pi';?></td>
		<td><?php echo $_SESSION['pi'] ;?></td>
	</tr>
	<?php

$_SESSION['j']++;
}
while($row=mysqli_fetch_array($result))
{
	if(strcmp($row['st_woid'],$_REQUEST['or'])==0)
	{
		
		$_SESSION['pi']=$row['st_picomment'];
		display();		
	}
}
?>