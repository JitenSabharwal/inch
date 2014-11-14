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
$result=mysqli_query($con,"Select * from cle_client");
 
 while($row= mysqli_fetch_array($result))
            {
              if(strcmp($row['cl_clid'],$_POST['user'])==0)   
              { 

                if(strcmp($row['cl_password'],md5($_POST['pass']))==0)
                {	
                	$x=1;
                    $_SESSION['usid']=$row['cl_clid']; 
                    $_SESSION['Employee']=$row['cl_clname'];
                   
                          $_SESSION['role']="Client";
                          header ("location:./client/client.php?op=overview");
                       
                     // else
                     // header ("location:index.php?pid=err");      
                }
              }
              
              
            }
}
if($x==0)
{
 header ("location:client.php");     
}
}
?>                          		
