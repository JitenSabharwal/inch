<?php
session_start();
include 'connection.php';
if(@$_REQUEST['op']=='wo_po' && @$_REQUEST['search']=='click'  && @$_REQUEST['po']=='click' && @$_REQUEST['wo']=='create')
{
   include 'stage.php'; 
    if(empty($insert))
      {
        echo "failed";
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