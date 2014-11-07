<?php include 'connection.php'
?>
<?php include 'intialize.php' ?>
<?php
$name = explode(" ", $_SESSION['Employee']);

//#####################################################
$result=mysqli_query($con,"SELECT * from prj_project");//the query to get the whole database in one variable 
$result1=mysqli_query($con,"SELECT * from orders");       
$result2=mysqli_query($con,"SELECT * from pod_order");
$result3=mysqli_query($con,"SELECT * from wok_order");
//######################################################

  function display_project()//function to display the table values 
          {
            ?>          
        <tr>
              <td><a href="pi_page.php?op=<?php echo $_REQUEST['op']; ?>&search=click&pn=<?php echo $_SESSION['project_name'] ?>&or=<?php echo @$_SESSION['order'];?>&po=click&quote=<?php echo $_REQUEST['quote'];?>"> <?php  echo @$_SESSION['project_name'];  ?></a></td>
              <td><?php echo @$_SESSION['project_id'];?></td>
              <td><?php echo @$_SESSION['status']    ;?></td>
              <td><?php echo @$_SESSION['date']      ;?></td>
              <td><?php echo @$_SESSION['order'];?></td>
        </tr>
      <?php
       }

while($row=mysqli_fetch_array($result))
  {
      if(strcmp($row['pr_prname'],@$_REQUEST['pn'])==0)
      {
        //echo @$_REQUEST['pn'];
              $_SESSION['project_name'] =$_REQUEST['pn'];
              $_SESSION['project_id']   =$row['pr_prid'];
              $_SESSION['status']       =$row['pr_prnotes'];
              $_SESSION['date']         =$row['pr_adtm'];
              $_SESSION['order']        =$_REQUEST['or'];
              display_project(); 
         
                               
      }
  }
/*while($row=mysqli_fetch_array($result3))
{
  if($row['wo_wocid']==$_SESSION['order'])
  {
    //echo "wrking";
    while($row1=mysqli_fetch_array($result4))
    {
      if($row['wo_quoteid']==$row1['qu_quid'])
      {
        while($row2=mysqli_fetch_array($result5))
        {
          if($row2['ve_veid']==$row1['qu_venid'])
          {
            $_SESSION['vendorp']=$row2['ve_vname'];
            $_SESSION['contactp']=$row2['ve_contact1'];
          }
        }
      }
    }
  }

}
while($row=mysqli_fetch_array($result2))
{
  if($row['po_pocid']==$_SESSION['order'])
  {
    
    while($row1=mysqli_fetch_array($result4))
    {

      if($row['po_quoteid']==$row1['qu_quid'])
      {
        //echo "wrking";
        while($row2=mysqli_fetch_array($result5))
        {
          
          echo $row2['ve_vname'];
          if(strcmp($row2['ve_veid'],$row1['qu_venid'])==0)
          {

            $_SESSION['vendorp']=$row2['ve_vname'];

            $_SESSION['contactp']=$row2['ve_contact1'];
          }
        }
      }
    }
  }

}

*/
?>