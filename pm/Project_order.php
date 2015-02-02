<table width="700" class="table table-bordered table-hover">
<tr>
<td>Project Name</td>
<td>Order Id</td>
<td>Status</td>
 </tr>

 <?php
################################################################################################
$result=mysqli_query($con,"SELECT * from orders");//the query to get the whole database in one variable        
$value=0;
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
 			$value=1;
 			$_SESSION['name']=$row['or_prjname'];
 			$_SESSION['id']=$row['or_wopo_cid'];
 			$_SESSION['status']=$row['or_status'];
 			display();
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

<center>
      <?php 
      

        include '../include/find_project.php';

            ?>
<br>
<br>