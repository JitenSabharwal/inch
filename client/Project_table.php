<?php 
include 'connection.php';?>
<?php include_once 'intialize.php' ?>
<?php 
##########################################################
$result=mysqli_query($con,"SELECT * from prj_project");  //the query to get the whole database in one variable        
$result1=mysqli_query($con,"SELECT * from orders");     //the query to get the whole database in one variable        
##########################################################
      function test_input($data)              //this is to set the value porperly removing all the extra sapces and other things ... 
      {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
      }

     function display_project()               //function to display the table values 
          {
            ?>
          
        <tr>
          <td><a href="client.php?op=<?php echo $_REQUEST['op']; ?>&search=click&pn=<?php echo $_SESSION['project_name']?>&po=click">
          <?php 
          echo @$_SESSION['project_name']; 
          ?></a></td>
          <td><?php echo @$_SESSION['project_id'];?></td>
          <td><?php echo @$_SESSION['status']    ;?></td>
          <td><?php echo @$_SESSION['date']      ;?></td>
        </tr>
      <?php
        }


//starting th etable part....


              
              while($row= mysqli_fetch_array($result))
                    {
                         if(strcmp($row['client_name'],$_SESSION['Employee'])==0)
                        {
                          $_SESSION['project_name'] =$row['pr_prname'];     
                          $_SESSION['project_id']   =$row['pr_prid'];
                          $_SESSION['status']       =$row['pr_prnotes'];
                          $_SESSION['date']         =$row['pr_odate'];
                           display_project();          //calling the function diaplay                          
                        }
                     }               
         

  ?>





