<?php

session_start();
$pid=$_REQUEST['pid'];

if($pid=='click')
  {
if(isset($_REQUEST['user'])&&isset($_REQUEST['pass']))
{
  include('connection.php');
//echo "working";
$x=0;
$result=mysqli_query($con,"Select * from usx_user");

 
 while($row= mysqli_fetch_array($result))
            {
              if(strcmp($row['us_usid'],$_POST['user'])==0)   
              { 

                if(strcmp($row['us_password'],md5($_POST['pass']))==0)
                {	
                	$x=1;
                    $_SESSION['usid']=$row['us_usid']; 
                    $_SESSION['Employee']=$row['us_fname']." ".$row['us_lname'];
                   // echo $_SESSION['Employee'];
                    //$role=mysqli_query($con,"Select us_pi,us_pm,us_si,us_md,us_ps,us_fs from usx_user where us_usid")        
                    if(isset($row['us_pm']))
                      { 
                          $_SESSION['role']="Project Manager";                                 
                          header ("location:./pm/pm_page.php?op=overview");
                      }                   
                    else if(isset($row['us_md']))
                     {
                      $_SESSION['role']="Managing Director";
                      header ("location:./md/md_page.php?op=overview");
                      }                  
                    else if(isset($row['us_si']))
                      {
                        $_SESSION['role']="Si";
                          header ("location:./si/si_page.php?op=overview");
                      }
                    else if(isset($row['us_ps']))
                      {
                          $_SESSION['role']="Ps";
                          header ("location:./ps/ps_page.php?op=quotation");
                       }
                    else if(isset($row['us_fs']))
                      {
                          $_SESSION['role']="FS";
                          header ("location:./fs/fs_page.php?op=overview");
                       }
                    else if(isset($row['us_pi']))
                      {
                          $_SESSION['role']="Pi";
                          header ("location:./pi/pi_page.php?op=quotation");
                       }
                        else if(isset($row['us_client']))
                      {
                          $_SESSION['role']="Client";
                          header ("location:./client/client.php?op=overview");
                       }
                      else
                      header ("location:index.php?pid=err");      
                }
              }
              
              
            }
}
if($x==0)
{
 header ("location:index.php");     
}
}
?>                          		
