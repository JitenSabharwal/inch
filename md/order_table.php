<table width="700" border="2">
  <tr>
    <th>S.no</th>
  <th>Description</th>
  <th>Quantity</th>
  <th>Rate</th>
  <th>Total</th>

  </tr>
  <?php
include 'connection.php';
//$total=0;
$_SESSION['j']=1;

function display()
{//echo "<td>".$_SESSION['j']
?>
	<tr>
    <td><?php echo $_SESSION['j'];?></td>
    
    <td><?php echo $_SESSION['desc']; ?></td>
    
    <td><?php echo $_SESSION['quantity']?></td>
    
    <td><?php echo $_SESSION['rate'];?></td>

    <td><?php echo $_SESSION['total']; ?></td>
  </tr>
  <?php
//echo "rate".$_SESSION['j'];
$_SESSION['j']++;
}

######################################################
$result=mysqli_query($con,"SELECT * from prj_project");
$result1=mysqli_query($con,"SELECT * from wok_order");
$result2=mysqli_query($con,"SELECT * from pod_order");
######################################################  

while($row=mysqli_fetch_array($result))
  {
    
  	if(strcmp($row['pr_prname'],$_REQUEST['pn'])==0)
  	{
  		$_SESSION['prid']=$row['pr_prid'];      
  	}
    
  }
  
  
while($row=mysqli_fetch_array($result1))
  	{
      if(strcmp($_REQUEST['or'],$row['wo_wocid'])==0)
      {
      		if(strcmp($row['wo_prid'], $_SESSION['prid'])==0)
      		{
      			$_SESSION['desc']=$row['wo_wodesc'];
      			$_SESSION['quantity']=$row['wo_woquantity'];
            $_SESSION['rate']=$row['wo_worate'];
            $_SESSION['fscom']=$row['wo_fscomment'];  
            $_SESSION['total']=$row['wo_worate']*$row['wo_woquantity'];
            display();
      		}	
  	  }
   } 

while($row1=mysqli_fetch_array($result2))
    {
        if($_REQUEST['or']==$row1['po_pocid'])
        {
            if(strcmp($row1['po_prid'], $_SESSION['prid'])==0)
            {
              $_SESSION['desc']=$row1['po_podesc'];
              $_SESSION['quantity']=$row1['po_poquantity'];
              $_SESSION['order']=$_REQUEST['or'];
              $_SESSION['rate']=$row1['po_porate'];      
              $_SESSION['total']=$row1['po_porate']*$row1['po_poquantity'];    
              display();  
            }
        }
    }

?>
</table>
<br>
<br>
