<table class="tab-border table"  width="500">
  
  <tr>
    <td>
      S.No.
    </td>
    <td>
        Authority
    </td>
    <td>
      Comment
    </td>   
  </tr>

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
	<tr>
		<td> <?php echo $_SESSION['j']+1; ?></td>		
		<td><?php echo 'PM';?></td>
		<td><?php echo $_SESSION['pm'] ;?></td>	
	</tr>
	<tr>
		<td> <?php echo $_SESSION['j']+2; ?></td>		
		<td><?php echo 'PS';?></td>
		<td><?php echo $_SESSION['ps'] ;?></td>
	</tr>
	<?php

//$_SESSION['j']+=3;
}
while($row=mysqli_fetch_array($result))
{
	if(strcmp($row['st_woid'],$_REQUEST['or'])==0)
	{
		if($row['st_stid']==$_REQUEST['st'])
		{
			$_SESSION['pi']=$row['st_picomment'];
			$_SESSION['pm']=$row['st_pmcomment'];
			$_SESSION['ps']=$row['st_pscomment'];
			display();		
		}
	}
}
?>
</table>
