

<?php include_once 'intialize.php' ?>
<?php 
$emp = trim($_SESSION['Employee']);

//#####################################################
$result=mysqli_query($con,"SELECT * from prj_project where pr_fs='$emp'");//the query to get the whole database in one variable 
$result1=mysqli_query($con,"SELECT * from orders");  
 $value=0;    
//######################################################
      
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
              <td><a href="fs_page.php?op=<?php echo $_REQUEST['op']; ?>&search=click&pn=<?php echo $_SESSION['project_name']; ?>&or=<?php echo $_SESSION['order'];?>&po=click"> <?php  echo @$_SESSION['project_name'];  ?></a></td>
              <td><?php echo $_SESSION['project_id'];?></td>
              <td><?php echo $_SESSION['status'];?></td>
              <td><?php echo $_SESSION['date'];?></td>
              <td><?php echo $_SESSION['order'];?></td>
        </tr>
      <?php
        }


//starting th etable part....


if ($_SERVER["REQUEST_METHOD"] == "POST" && $_REQUEST['search']=='click') //whether has he clicked on post and search has been clickek
{

            if( empty($_SESSION['pn'])&& empty($_SESSION['pid']))//if user just clicks at search
            {
               
                while($row= mysqli_fetch_array($result))
                      {
                               while($row1=mysqli_fetch_array($result1))
                                {

                                    if($row['pr_prname']==$row1['or_prjname'])
                                      { 
                                            if($row1['or_status']=='WO(FS check for funds)')
                                            {
                                                  $value=1;
                                                  $_SESSION['project_name'] =$row1['or_prjname'];
                                                  $_SESSION['project_id']   =$row1['or_prid'];
                                                  $_SESSION['status']       =$row1['or_status'];
                                                  $_SESSION['date']         =$row['pr_odate'];
                                                  $_SESSION['order']        =$row1['or_wopo_cid'];
                                                  display_project(); 
                                               
                                            }
                                            else if($row1['or_status']=='PO(FS check for funds)') 
                                            {
                                                  $value=1;
                                                  $_SESSION['project_name'] =$row1['or_prjname'];
                                                  $_SESSION['project_id']   =$row1['or_prid'];
                                                  $_SESSION['status']       =$row1['or_status'];
                                                  $_SESSION['date']         =$row['pr_odate'];
                                                  $_SESSION['order']        =$row1['or_wopo_cid'];
                                                  display_project(); 
                                               
                                            }
                                }                             
                                //$_SESSION['initiated_by'] =$row['pr_md'];
                               //callin-g the function diaplay                          
                            }
                                mysqli_data_seek($result1,0);
                      }                    
            }

    
            elseif(isset($_SESSION['pn']) && empty($_SESSION['pid']))
            {
                   
                    $pname=test_input($_POST['project_name']);  
                      while($row= mysqli_fetch_array($result))
                      {
                        if(strcmp($row['pr_prname'],$pname)==0)
                        {
                    
                               while($row1=mysqli_fetch_array($result1))
                                {
                                  if($row['pr_prname']==$row1['or_prjname'])
                                   { 
                                        
                                      if($row1['or_status']=='WO(FS check for funds)')
                                      {
                                                  $value=1;
                                            $_SESSION['project_name'] =$row1['or_prjname'];
                                            $_SESSION['project_id']   =$row1['or_prid'];
                                            $_SESSION['status']       =$row1['or_status'];
                                            $_SESSION['date']         =$row['pr_odate'];
                                            $_SESSION['order']        =$row1['or_wopo_cid'];
                                            display_project(); 
                                         
                                      }
                                      else if($row1['or_status']=='PO(FS check for funds)') 
                                      {
                                                  $value=1;
                                            $_SESSION['project_name'] =$row1['or_prjname'];
                                            $_SESSION['project_id']   =$row1['or_prid'];
                                            $_SESSION['status']       =$row1['or_status'];
                                            $_SESSION['date']         =$row['pr_odate'];
                                            $_SESSION['order']        =$row1['or_wopo_cid'];
                                            display_project(); 
                                         
                                      } 
                                }           
                                //$_SESSION['initiated_by'] =$row['pr_md'];
                               //callin-g the function diaplay                          
                            }
                                mysqli_data_seek($result1,0);
                      }
            }
          }
            elseif(isset($_SESSION['pid']) && empty($_SESSION['pn']))
                  {
                        while($row= mysqli_fetch_array($result))
                        {
                             
                              if(strcmp($row['pr_prid'],$_SESSION['pid'])==0)
                              {
                             
                                  while($row1=mysqli_fetch_array($result1))
                                    {
                                      if($row['pr_prname']==$row1['or_prjname'])
                                         { 
                                        
                                          if($row1['or_status']=='WO(FS check for funds)')
                                          {
                                                  $value=1;
                                                $_SESSION['project_name'] =$row1['or_prjname'];
                                                $_SESSION['project_id']   =$row1['or_prid'];
                                                $_SESSION['status']       =$row1['or_status'];
                                                $_SESSION['date']         =$row['pr_odate'];
                                                $_SESSION['order']        =$row1['or_wopo_cid'];
                                                display_project(); 
                                             
                                          }
                                          else if($row1['or_status']=='PO(FS check for funds)') 
                                          {
                                                  $value=1;
                                                $_SESSION['project_name'] =$row1['or_prjname'];
                                                $_SESSION['project_id']   =$row1['or_prid'];
                                                $_SESSION['status']       =$row1['or_status'];
                                                $_SESSION['date']         =$row['pr_odate'];
                                                $_SESSION['order']        =$row1['or_wopo_cid'];
                                                display_project(); 
                                             
                                          } 
                                    }
                                //$_SESSION['initiated_by'] =$row['pr_md'];
                               //callin-g the function diaplay                          
                            }
                                mysqli_data_seek($result1,0);
                              }
                        }
                  }
if($value==0)
  {
  ?>
  <tr>
      <td colspan="5" align="center" >No &nbsp; Results </td>
  </tr>
  <?php
  }

}

  ?>





