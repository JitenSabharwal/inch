<tr>
      <td>Project Name </td>
      <td>Project ID </td>
      <td>Status</td>
      <td>Date</td>
      <td>Order Id </td>
</tr>
    
<?php 
include '../include/connection.php';
 include_once 'intialize.php' ?>
<?php 
#######################################################
$emp=trim($_SESSION['Employee']);
$result=mysqli_query($con,"SELECT * from prj_project where pr_md='$emp'");//the query to get the whole database in one variable   
$result1=mysqli_query($con,"SELECT * from orders");     
########################################################
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
          <td>
            <?php 
            if($_SESSION['status']=='Site Survey')
                {
            ?>
                <a href="md_page.php?op=<?php echo $_REQUEST['op']; ?>&search=click&pn=<?php echo $_SESSION['project_name']?>&or=<?php echo $_SESSION['order']?>&po=click&status=stage">
          <?php 
                echo $_SESSION['project_name']; 
                }
          if($_SESSION['status']=='No Funds' || $_SESSION['status'] =='WO(MD Approval)'|| $_SESSION['status'] =='PO(MD Approval)')
                  {
          ?>
               <a href="md_page.php?op=<?php echo $_REQUEST['op']; ?>&search=click&pn=<?php echo $_SESSION['project_name']?>&or=<?php echo $_SESSION['order']?>&po=click&status=funds">
          <?php 
                echo $_SESSION['project_name']; 
          }
          ?>
                </a>
           </td>

          <td><?php echo @$_SESSION['project_id'];?></td>
          <td><?php echo @$_SESSION['status']    ;?></td>
          <td><?php echo @$_SESSION['date']      ;?></td>
          <td><?php echo @$_SESSION['order'];?></td>
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
                        
                        {
                       
                          while($row1=mysqli_fetch_array($result1))
                          {
                              if($row['pr_prname']==$row1['or_prjname'])
                          	   {
                                    if(strcmp($row1['or_status'],'WO(MD Approval)')==0)	
        	                          {
        		                          $_SESSION['project_name'] =$row1['or_prjname'];
                                     // echo  $_SESSION['project_name'];    
        			                        $_SESSION['project_id']   =$row1['or_prid'];
        			                        $_SESSION['status']       =$row1['or_status'];
        			                        $_SESSION['date']         =$row['pr_odate'];
        			                        $_SESSION['order'] 		   =$row1['or_wopo_cid'];
        			                        display_project();//calling the function diaplay                          
                             		  }
                                  if(strcmp($row1['or_status'],'PO(MD Approval)')==0) 
                                    {
                                      $_SESSION['project_name'] =$row1['or_prjname'];
                                     // echo  $_SESSION['project_name'];    
                                      $_SESSION['project_id']   =$row1['or_prid'];
                                      $_SESSION['status']       =$row1['or_status'];
                                      $_SESSION['date']         =$row['pr_odate'];
                                      $_SESSION['order']       =$row1['or_wopo_cid'];
                                      display_project();//calling the function diaplay                          
                                  }
                                  		
                             			else if (strcmp($row1['or_status'],'No Funds')==0) 
                             			{
                             				   $_SESSION['project_name'] =$row1['or_prjname'];     
                                      $_SESSION['project_id']   =$row1['or_prid'];
                                      $_SESSION['status']       =$row1['or_status'];
                                      $_SESSION['date']         =$row['pr_odate'];
                                      $_SESSION['order']       =$row1['or_wopo_cid'];
                                      display_project();
                             			}
                                  elseif(strcmp($row1['or_status'],'Site Survey')==0)
                                  {
                                       $_SESSION['project_name'] =$row1['or_prjname'];     
                                      $_SESSION['project_id']   =$row1['or_prid'];
                                      $_SESSION['status']       =$row1['or_status'];
                                      $_SESSION['date']         =$row['pr_odate'];
                                      $_SESSION['order']       =$row1['or_wopo_cid'];
                                      display_project();
                                  }
                               }     
                     		}
                                mysqli_data_seek($result1,0);
                     	}	 
                      }              
            }

    
            elseif(isset($_SESSION['pn']) && empty($_SESSION['pid']) && empty($_SESSION['stat']))
            {
                   
                    $pname=test_input($_POST['project_name']);  
                      while($row= mysqli_fetch_array($result))
                      {
                        
                        while($row1=mysqli_fetch_array($result1))
                          {
                            if($row['pr_prname']==$row1['or_prjname'])
                              {
                                	if(strcmp($row1['or_status'],"WO(MD Approval)")==0)	
      	                          {
      		                             $_SESSION['project_name'] =$row1['or_prjname'];     
                                    $_SESSION['project_id']   =$row1['or_prid'];
                                    $_SESSION['status']       =$row1['or_status'];
                                    $_SESSION['date']         =$row['pr_odate'];
                                    $_SESSION['order']       =$row1['or_wopo_cid'];
                                    display_project();// the function diaplay                          
                           		  }
                           		  elseif (strcmp($row1['or_status'],'No Funds')==0) 
                           			{
                           				  $_SESSION['project_name'] =$row1['or_prjname'];     
                                    $_SESSION['project_id']   =$row1['or_prid'];
                                    $_SESSION['status']       =$row1['or_status'];
                                    $_SESSION['date']         =$row['pr_odate'];
                                    $_SESSION['order']       =$row1['or_wopo_cid'];
                                    display_project();
                           			}
                                 elseif(strcmp($row1['or_status'],'Site Survey')==0)
                                {
                                     $_SESSION['project_name'] =$row1['or_prjname'];     
                                    $_SESSION['project_id']   =$row1['or_prid'];
                                    $_SESSION['status']       =$row1['or_status'];
                                    $_SESSION['date']         =$row['pr_odate'];
                                    $_SESSION['order']       =$row1['or_wopo_cid'];
                                    display_project();
                                }
                            }
                     		}
                                mysqli_data_seek($result1,0);
                      }
            }
            elseif(isset($_SESSION['pid']) && empty($_SESSION['pn']) && empty($_SESSION['stat']))
                  {
                        while($row= mysqli_fetch_array($result))
                        {
                             
                             while($row1=mysqli_fetch_array($result1))
                          {
                            if($row['pr_prname']==$row1['or_prjname'])
                                {
                                    	if(strcmp($row1['or_status'],"WO(MD Approval)")==0)	
          	                          {
          		                             $_SESSION['project_name'] =$row1['or_prjname'];     
                                        $_SESSION['project_id']   =$row1['or_prid'];
                                        $_SESSION['status']       =$row1['or_status'];
                                        $_SESSION['date']         =$row['pr_odate'];
                                        $_SESSION['order']       =$row1['or_wopo_cid'];
                                        display_project();                      
                               		  }
                               		  elseif (strcmp($row1['or_status'],'No Funds')==0) 
                               			{
                               				  $_SESSION['project_name'] =$row1['or_prjname'];     
                                        $_SESSION['project_id']   =$row1['or_prid'];
                                        $_SESSION['status']       =$row1['or_status'];
                                        $_SESSION['date']         =$row['pr_odate'];
                                        $_SESSION['order']       =$row1['or_wopo_cid'];
                                        display_project();
                               			}
                                     elseif(strcmp($row1['or_status'],'Site Survey(MD)')==0)
                                    {
                                         $_SESSION['project_name'] =$row1['or_prjname'];     
                                        $_SESSION['project_id']   =$row1['or_prid'];
                                        $_SESSION['status']       =$row1['or_status'];
                                        $_SESSION['date']         =$row['pr_odate'];
                                        $_SESSION['order']       =$row1['or_wopo_cid'];
                                        display_project();
                                    }
                              }  
                     		}
                                mysqli_data_seek($result1,0);
                        }
                  }
            
          
}

  ?>





 