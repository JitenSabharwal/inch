<table width="700" class="table table-bordered table-hover">
<tr>
<td>Project Name</td>
<td>Order Id</td>
<td>Status</td>
 </tr>

 <?php
################################################################################################
$result=mysqli_query($con,"SELECT * from orders");//the query to get the whole database in one variable        
 ################################################################################################
 function display()
 {
 	?>
 	<tr>
 	<td><?php echo $_SESSION['name']; ?></td>
 	<td><?php echo $_SESSION['id']; ?></td>
 	<td><?php echo $_SESSION['status']; ?></td>
 </tr>
 <?php	
 }
 	while($row=mysqli_fetch_array($result))
 	{
 		if($row['or_prjname']==$_REQUEST['pn'])
 		{
 			$_SESSION['name']=$row['or_prjname'];
 			$_SESSION['id']=$row['or_wopo_cid'];
 			$_SESSION['status']=$row['or_status'];
 			display();
 		}
 	}
 ?>
 </table>

 