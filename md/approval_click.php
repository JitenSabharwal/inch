<?php

################################################
$result=mysqli_query($con,"SELECT * from orders");
$result1=mysqli_query($con,"SELECT * from prj_project");
#################################################
function display_project1()//function to display the table values 
      {
        ?>      
    <tr>
      <td><a href="md_page.php?op=<?php echo $_REQUEST['op']; ?>&search=click&pn=<?php echo $_SESSION['project_name']?>&or=<?php echo $_REQUEST['or'];?>&po=click&status=<?php echo $_REQUEST['status'];?>">
      <?php 
      echo @$_SESSION['project_name']; 
      ?></a></td>
      <td><?php echo @$_SESSION['project_id'];?></td>
      <td><?php echo @$_SESSION['status']    ;?></td>
      <td><?php echo @$_SESSION['date']      ;?></td>
      <td><?php echo @$_SESSION['order']	 ;?></td>
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
			                        //$_SESSION['date']         =$row['or_adtm'];
			                        $_SESSION['order'] =$row['or_wopo_cid'];
			                        display_project1();//calling the function diaplay                          
                     		  }
                     		          
      }
  }

  

?>