
<?php include 'intialize.php' ?>
<?php
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
              <td><?php
                  include 'connection.php'; 
                  $pn=$_REQUEST['pn'];
                  $result3=mysqli_query($con,"SELECT * from prj_project where pr_prname='$pn'");//the query to get the whole database in one variable 
                  
                    while($row3=mysqli_fetch_array($result3))
                    {
                        {
                          echo $row3['pr_odate'];
                        }
      
                    }          
                ?></td>
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
              $_SESSION['status']       ="Request for quotes";
              $_SESSION['date']         =$row['pr_odate'];
              $_SESSION['order']        =$_REQUEST['or'];
              display_project(); 
         
                               
      }
  }

?>