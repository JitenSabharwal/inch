<?php include 'connection.php'
?>
<?php include 'intialize.php' ?>
<?php
//$name = explode(" ", $_SESSION['Employee']);

//#####################################################
$result=mysqli_query($con,"SELECT * from prj_project");//the query to get the whole database in one variable 
$result1=mysqli_query($con,"SELECT * from orders");       
//######################################################

  function display_project()//function to display the table values 
          {
            ?>          
        <tr>
              <td><a href="ps_page.php?op=<?php echo $_REQUEST['op']; ?>&search=click&pn=<?php echo $_SESSION['project_name'] ?>&or=<?php echo @$_SESSION['order'];?>&po=click"> <?php  echo @$_SESSION['project_name'];  ?></a></td>
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
              while($row1=mysqli_fetch_array($result1))
              {
                 if($_REQUEST['or']==$row1['or_wopo_cid'])
                  $_SESSION['status']       =$row1['or_status'];
              }
              $_SESSION['date']         =$row['pr_odate'];
              $_SESSION['order']        =$_REQUEST['or'];
              display_project(); 
         
                               
      }
  }

?>