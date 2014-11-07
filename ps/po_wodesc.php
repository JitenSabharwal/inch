<?php
include 'connection.php';

$result1=mysqli_query($con,"SELECT * from wok_order");
$result2=mysqli_query($con,"SELECT * from pod_order");
$_SESSION['j']=1;
function displaydetail()
{
?>	 
<tr>
	<td><?php echo $_SESSION['j'];?></td>
    <td><?php echo $_SESSION['desc'];?></td>
    <td><?php echo $_SESSION['quantity'];?></td>
    <td><?php echo $_SESSION['rate'];?></td>
    <td><?php echo $_SESSION['total']; ?></td>
 </tr>
<?php
$_SESSION['j']++;
}
$result=mysqli_query($con,"SELECT * from prj_project");
  
while($row=mysqli_fetch_array($result))
  {
    
  	if(strcmp($row['pr_prname'],$_REQUEST['pn'])==0)
  	{
  		$_SESSION['prid']=$row['pr_prid'];      
  	}
    
  }

while($row=mysqli_fetch_array($result1))
{
	if(strcmp($row['wo_wocid'],$_REQUEST['or'])==0)
  {
    if(strcmp($row['wo_prid'], $_SESSION['prid'])==0)
	 {
		  $_SESSION['desc']=$row['wo_wodesc'];
  		$_SESSION['quantity']=$row['wo_woquantity'];
  		$_SESSION['rate']=$row['wo_worate'];
		  $_SESSION['total']=$row['wo_worate']*$row['wo_woquantity'];
      if(isset( $_SESSION['desc']))
		  displaydetail();
  	}
 }
}
while($row=mysqli_fetch_array($result2))
{
  if(strcmp($row['po_pocid'],$_REQUEST['or'])==0)
  {
    	if(strcmp($row['po_prid'], $_SESSION['prid'])==0)
          {
                $_SESSION['desc']=@$row['wo_wodesc'];
                $_SESSION['quantity']=@$row['wo_woquantity'];
          	    $_SESSION['rate']=$row['po_porate'];
    		        $_SESSION['total']=$row['po_porate']*$row['po_poquantity'];
    		if(isset( $_SESSION['desc']))
        displaydetail();
    	 }
  }     
}

?>