<table class="tab-border table"width="500">
	<tr>
		<td>Stage Id</td>
		<td>Project Name</td>	
		<td>Work Order</td>
		
	</tr>
<?php
		function display_st()
		{
?>
			<tr>
					<td><a href="pi_page.php?op=<?php echo $_REQUEST['op']; ?>&search=click&pn=<?php echo $_REQUEST['pn']; ?>&or=<?php echo $_REQUEST['or'];?>&po=click&st=<?php echo $_SESSION['stg_id'];?>&st_click=click"><?php echo $_SESSION['stg_id'];?></a></td>
					<td><?php echo $_REQUEST['pn'];?></td>
					<td><?php echo $_SESSION['woid'];?></td>
			</tr>
<?php
		}
##########################################################################################################
$result=mysqli_query($con,"SELECT * from stg_status");
###########################################################################################################
		
		while($row=mysqli_fetch_array($result)) 
		{
			if($row['st_woid']==$_REQUEST['or'])
			{
				if($row['st_stageid']==$_REQUEST['st'])
				{
					$_SESSION['stg_id']=$row['st_stageid'];
					$_SESSION['woid']=$row['st_woid'];
					display_st();				
				}
			}	
		}

?>
</table>
<br>
