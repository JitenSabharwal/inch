
<?php

session_start();
$pid=$_REQUEST['pid'];

$_SESSION['second_login_count']=0;


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
                           setcookie("user_role","pm",time()+(86400*30),"/");
                      }                   
                    else if(isset($row['us_md']))
                     {
                      $_SESSION['role']="Managing Director";
                    
                      header ("location:./md/md_page.php?op=overview");
                       setcookie("user_role","md",time()+(86400*30),"/");
                      }                  
                    else if(isset($row['us_si']))
                      {
                        $_SESSION['role']="Site Engineer";
                      
                          header ("location:./si/si_page.php?op=overview");
                           setcookie("user_role","si",time()+(86400*30),"/");
                       // setcookie("login_count","set","","/","",0);
                            
                      }
                    else if(isset($row['us_ps']))
                      {
                          $_SESSION['role']="Purchase Specialist";
                         
                          header ("location:./ps/ps_page.php?op=quotation");
                          setcookie("user_role","ps",time()+(86400*30),"/");
                       }
                    else if(isset($row['us_fs']))
                      {
                          $_SESSION['role']="Finance Specialist";
                        
                          header ("location:./fs/fs_page.php?op=overview");
                           setcookie("user_role","fs",time()+(86400*30),"/");
                       }
                    else if(isset($row['us_pi']))
                      {
                          $_SESSION['role']="Project Engineer";
                         
                          header ("location:./pi/pi_page.php?op=quotation");
                           setcookie("user_role","pi",time()+(86400*30),"/");
                       }
                        else if(isset($row['us_client']))
                      {
                          $_SESSION['role']="Client";
                            
                          header ("location:./client/client.php?op=overview");
                           setcookie("user_role","client",time()+(86400*30),"/");
                       }
                      else
                     // header ("location:index.php?pid=err");    
                     echo "<script>alert('Error in log in,please try again')</script>";  
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
