<?php

//$total=0;
######################################################
$result=mysqli_query($con,"SELECT * from prj_project");
$result1=mysqli_query($con,"SELECT * from wok_order");
$result2=mysqli_query($con,"SELECT * from pod_order");
$_SESSION['result3']=mysqli_query($con,"SELECT * from qut_quote");
$_SESSION['result5']=mysqli_query($con,"SELECT * from ven_vendor");
######################################################  

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
$_SESSION['j']++;
}
function vendor()
{
  while($row3=mysqli_fetch_array($_SESSION['result3']))
  {
    if(strcmp($_SESSION['qid'],$row3['qu_quid'])==0)
    {
      while($row2=mysqli_fetch_array($_SESSION['result5']))
      {
        if(strcmp($row3['qu_venid'],$row2['ve_veid'])==0)
        {
            $_SESSION['vendor']= $row2['ve_vname'];
            $_SESSION['contact']=$row2['ve_contact1'];
        }
      }
    }
  }
}

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
            if($_REQUEST['quote']=="0")
              {
                $_SESSION['qid']=$row['wo_quoteid1'];
                $_SESSION['rate']=$row['wo_rateq1'];
                vendor();
              }
            else if($_REQUEST['quote']=="1")
            {
              $_SESSION['qid']=$row['wo_quoteid2'];
              $_SESSION['rate']=$row['wo_rateq2'];
              vendor();
            }
          if($_REQUEST['quote']=="2")
            {
              $_SESSION['qid']=$row['wo_quoteid3'];
              $_SESSION['rate']=$row['wo_rateq3'];
              vendor();
            }
            $_SESSION['total']=$_SESSION['quantity']*$_SESSION['rate'];
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
                  if($_REQUEST['quote']=="0")
                  {
                    $_SESSION['qid']=$row['po_quoteid1'];
                    $_SESSION['rate']=$row['po_rateq1'];
                    vendor();
                  }
                  else if($_REQUEST['quote']=="1")
                  {
                    $_SESSION['qid']=$row['po_quoteid2'];
                    $_SESSION['rate']=$row['po_rateq2'];
                    vendor();
                  }
                  if($_REQUEST['quote']=="2")
                    {
                      $_SESSION['qid']=$row['po_quoteid3'];
                      $_SESSION['rate']=$row['po_rateq3'];
                      vendor();
                    }
                    $_SESSION['total']=$_SESSION['quantity']*$_SESSION['rate'];
                display();  
            }
        }
    }  
  	
  
?>