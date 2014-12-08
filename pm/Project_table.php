<?php 
//session_start();
include 'connection.php';?>
<?php include_once 'intialize.php' ?>
<?php 
##########################################################
$result=mysqli_query($con,"SELECT * from prj_project");//the query to get the whole database in one variable        
$result1=mysqli_query($con,"SELECT * from orders");//the query to get the whole database in one variable        
##########################################################
      function test_input($data)//this is to set the value porperly removing all the extra sapces and other things ... 
      {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
      }

     function display_project()//function to display the table values 
          {
            ?>
          
        <tr>
          <td><a href="pm_page.php?op=<?php echo $_REQUEST['op']; ?>&search=click&pn=<?php echo $_SESSION['project_name']?>&po=click">
          <?php 
          echo @$_SESSION['project_name']; 
          ?></a></td>
          <td><?php echo @$_SESSION['project_id'];?></td>
          <td><?php echo @$_SESSION['date']      ;?></td>
          <td><?php echo @$_SESSION['initiated_by'];?></td>
        </tr>
      <?php
        }


//starting th etable part....

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_REQUEST['search']=='click' && @$_REQUEST['po']!='click') //whether has he clicked on post and search has been clickek
{

            if( empty($_SESSION['pn']) && empty($_SESSION['stat']) && empty($_SESSION['pid']))//if user just clicks at search
            {
              
              while($row= mysqli_fetch_array($result))
                    {
                         if(strcmp($row['pr_pm'],$_SESSION['Employee'])==0)
                        { //echo "string";
                          $_SESSION['project_name'] =$row['pr_prname'];     
                          $_SESSION['project_id']   =$row['pr_prid'];
                          $_SESSION['status']       =$row['pr_prnotes'];
                          $_SESSION['date']         =$row['pr_odate'];
                          $_SESSION['initiated_by'] =$row['pr_md'];
                          display_project();//calling the function diaplay                          
                        }
                     }               
            }

    
            elseif(isset($_SESSION['pn']) && empty($_SESSION['pid']) && empty($_SESSION['stat']))
            {
                   
                    $pname=test_input($_POST['project_name']);  
                      while($row= mysqli_fetch_array($result))
                      {
                        if(strcmp($row['pr_prname'],$pname)==0)
                        {
                          if(strcmp($row['pr_pm'],$_SESSION['Employee'])==0)
                        {
                          $_SESSION['project_name'] =$row['pr_prname'];     
                          $_SESSION['project_id']   =$row['pr_prid'];
                          $_SESSION['status']       =$row['pr_prnotes'];
                          $_SESSION['date']         =$row['pr_odate'];
                          $_SESSION['initiated_by'] =$row['pr_md'];
                          display_project();
                        }
                      }
                      }
            }
            elseif(isset($_SESSION['pid']) && empty($_SESSION['pn']) && empty($_SESSION['stat']))
                  {
                        while($row= mysqli_fetch_array($result))
                        {
                             
                              if(strcmp($row['pr_prid'],$_SESSION['pid'])==0)
                              {
                                if(strcmp($row['pr_pm'],$_SESSION['Employee'])==0)
                            {
                                $_SESSION['project_name'] =$row['pr_prname'];     
                                $_SESSION['project_id']   =$row['pr_prid'];
                                $_SESSION['status']       =$row['pr_prnotes'];
                                $_SESSION['date']         =$row['pr_odate'];
                                $_SESSION['initiated_by'] =$row['pr_md'];
                                display_project();
                             }
                          }
                        }
                  }
            
          elseif(isset($_SESSION['stat']) && empty($_SESSION['pn']) && empty($_SESSION['pid']))
           {
                while($row= mysqli_fetch_array($result))
                        {
                            if(strcmp($row['pr_pm'],$_SESSION['Employee'])==0)
                            { 
                              while($row1=mysqli_fetch_array($result1))
                              {   
                                if(strcmp($row1['or_status'],$_SESSION['stat'])==0)
                                {                               
                                  
                                    $_SESSION['project_name'] =$row['pr_prname'];     
                                    $_SESSION['project_id']   =$row['pr_prid'];
                                    $_SESSION['status']       =$row['pr_prnotes'];
                                    $_SESSION['date']         =$row['pr_odate'];
                                    $_SESSION['initiated_by'] =$row['pr_md'];
                                    display_project();
                                 }
                                } 
                              }
                        }
           } 


}

  ?>





