<?php 
include 'connection.php'
?>
<?php include 'intialize.php' ?>
<?php
$result=mysqli_query($con,"SELECT * from prj_project");//the query to get the whole database in one variable
//echo "working";        
function display_project1()//function to display the table values 
      {
        ?>      
    <tr>
      <td><a href="md_page.php?op=<?php echo $_REQUEST['op']; ?>&search=click&pn=<?php echo $_SESSION['project_name']; ?>&po=click">
      <?php 
      echo @$_SESSION['project_name']; 
      ?></a></td>
      <td><?php echo @$_SESSION['project_id'];?></td>
      <td><?php echo @$_SESSION['status']    ;?></td>
      <td><?php echo @$_SESSION['date']      ;?></td>
      <td><?php echo @$_SESSION['initiated_by'];?></td>
    </tr>
    <?php
    }

while($row=mysqli_fetch_array($result))
  { //echo "working";
      if(strcmp($row['pr_prname'],@$_REQUEST['pn'])==0)
      {
      	//echo @$_REQUEST['pn'];
         $_SESSION['project_name'] =$row['pr_prname'];     
         $_SESSION['project_id']   =$row['pr_prid'];
         $_SESSION['status']       =$row['pr_prnotes'];
         $_SESSION['date']         =$row['pr_adtm'];
         $_SESSION['initiated_by'] =$row['pr_md'];
         display_project1();//calling the function diaplay                          
      }
  }

  
?>