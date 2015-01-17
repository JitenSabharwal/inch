<?php
session_start();

if(@$_REQUEST['op']=='wo_po' && @$_REQUEST['search']=='click'  && @$_REQUEST['po']=='click' && @$_REQUEST['wo']=='create')
{
   include 'stage.php'; 
    if(empty($insert))
      {
        echo "erro"; 
      }
      else
      {
        $msg = wordwrap($com,70);
                              $head='From:noreply@auricktech.com';
                      // send email
                            mail("garvit1608@gmail.com","Ps Comment",$msg,$head);
      }
      else
      {
         include 'update.php';
         echo "<script>alert('stage table updated');</script>";
         
      }
      if($_SESSION['order']=="po")
      {
      	 include 'update.php';
      }
}
header("location:ps_page.php?op=wo_po&search=click");
?>