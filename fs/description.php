<?php
//session_start();
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
$resultv=mysqli_query($con,"SELECT * from ven_vendor");
$resultq=mysqli_query($con,"SELECT * from qut_quote");
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
      		if(strcmp(@$row['wo_prid'], $_SESSION['prid'])==0)
      		{
      			$_SESSION['desc']=$row['wo_wodesc'];
      			$_SESSION['quantity']=$row['wo_woquantity'];
            $_SESSION['rate']=$row['wo_worate'];
            //$_SESSION['vid']=@$row['wo_wovenid'];
            while($row1=mysqli_fetch_array($resultq))
            {
              if(@$row['wo_quoteid']==$row1['qu_quid'])
              {
                $_SESSION['vid']=@$row1['qu_venid'];
              }
            }
            $_SESSION['total']=$row['wo_worate']*$row['wo_woquantity'];
            display();
      		}	
  	  }
   } 

while($row=mysqli_fetch_array($result2))
    {
        if(strcmp($_REQUEST['or'], $row['po_pocid'])==0)
        {
            if(strcmp($row['po_prid'], $_SESSION['prid'])==0)
            {
              $_SESSION['desc']=$row['po_podesc'];
              $_SESSION['quantity']=$row['po_poquantity'];
              $_SESSION['order']=$_REQUEST['or'];
              $_SESSION['rate']=$row['po_porate'];
             while($row1=mysqli_fetch_array($resultq))
            {
              if(@$row['wo_quoteid']==$row1['qu_quid'])
              {
                $_SESSION['vid']=@$row1['qu_venid'];
              }
            }
             display();  
            }
        }
    }  
 while($row=mysqli_fetch_array($resultv))
 {
  if(strcmp(@$_SESSION['vid'],$row['ve_veid'])==0)
  {
    $_SESSION['name']=$row['ve_vname'];
    $_SESSION['contact']=$row['ve_contact1'];
  }
 } 	
  
?>