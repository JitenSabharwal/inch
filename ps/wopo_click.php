<?php

################################################
$result=mysqli_query($con,"SELECT * from orders");
$result1=mysqli_query($con,"SELECT * from prj_project");
$result2=mysqli_query($con,"SELECT * from pod_order");
$result3=mysqli_query($con,"SELECT * from wok_order");
$result4=mysqli_query($con,"SELECT * from qut_quote");
$result5=mysqli_query($con,"SELECT * from ven_vendor");
#################################################

function display_project1()//function to display the table values 
      {
        ?>      
    <tr>
      <td><a href="ps_page.php?op=<?php echo $_REQUEST['op']; ?>&search=click&pn=<?php echo $_SESSION['project_name']?>&or=<?php echo $_REQUEST['or'];?>&po=click">
      <?php 
      echo @$_SESSION['project_name']; 
      ?></a></td>
      <td><?php echo @$_SESSION['project_id'];?></td>
      <td><?php echo @$_SESSION['status']    ;?></td>
      <td><?php echo @$_SESSION['date']      ;?></td>
      <td><?php echo @$_SESSION['order'];?></td>
    </tr>
    <?php
    }

while($row=mysqli_fetch_array($result))
  {
      
      if(strcmp($row['or_prjname'],@$_REQUEST['pn'])==0)
      {
                            if(strcmp($row['or_wopo_cid'],@$_REQUEST['or'])==0) 
                            {
                                
                                $_SESSION['project_name'] =$row['or_prjname'];     
                                $_SESSION['project_id']   =$row['or_prid'];
                                $_SESSION['status']       =$row['or_status'];
                                //$_SESSION['date']         =@$row['or_adtm'];
                                $_SESSION['order']        =$row['or_wopo_cid'];
                                //$_SESSION['vid']          =$row1['']
                              display_project1();//calling the function diaplay                          
                            }
                                
      }
  }
while($row=mysqli_fetch_array($result3))
{
  if($row['wo_wocid']==$_SESSION['order'])
  {
    while($row1=mysqli_fetch_array($result4))
    {
      if($row['wo_quoteid']==$row1['qu_quid'])
      {
        while($row2=mysqli_fetch_array($result5))
        {
          if($row2['ve_veid']==$row1['qu_venid'])
          {
            $_SESSION['vendor']=$row2['ve_vname'];
            $_SESSION['contact']=$row2['ve_contact1'];
          }
        }
      }
    }
  }
}  

?>