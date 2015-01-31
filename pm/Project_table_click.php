
<?php include 'intialize.php' ?>
<?php
$result=mysqli_query($con,"SELECT * from prj_project");//the query to get the whole database in one variable        
$result1=mysqli_query($con,"SELECT * from orders");       
$value=0;
function display_project1()//function to display the table values 
      {
        ?>      
    <tr>
      <td><a href="pm_page.php?op=<?php echo $_REQUEST['op']; ?>&search=click&pn=<?php echo $_SESSION['project_name']?>&po=click">
      <?php 
      echo @$_SESSION['project_name']; 
      ?></a></td>
      <td><?php echo @$_SESSION['project_id'];?></td>
      
      <td><?php
                  include '../include/connection.php';
                  $pn=$_REQUEST['pn'];
                  $result3=mysqli_query($con,"SELECT * from prj_project where pr_prname='$pn'");//the query to get the whole database in one variable 
                  
                    while($row3=mysqli_fetch_array($result3))
                    {
                        {
                          echo $row3['pr_odate'];
                        }
      
                    }          
                ?></td>
      <td><?php echo @$_SESSION['initiated_by'];?></td>
    </tr>
    <?php
    }

while($row=mysqli_fetch_array($result))
  {
      if(strcmp($row['pr_prname'],@$_REQUEST['pn'])==0)
      {
      	//echo @$_REQUEST['pn'];
          $value=1;
         $_SESSION['project_name'] =$row['pr_prname'];     
         $_SESSION['project_id']   =$row['pr_prid'];
         
         $_SESSION['date']         =$row['pr_odate'];
         $_SESSION['initiated_by'] =$row['pr_md'];
         display_project1();//calling the function diaplay                          
      }
  }
if($value==0)
  {
  ?>
  <tr>
      <td colspan="3" align="center" >No &nbsp; Results </td>
  </tr>
  <?php
  }

  
?>