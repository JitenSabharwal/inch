<?php
session_start();
include '../include/connection.php';
if(@$_REQUEST['com']=='comment')
{
  
  if(@$_REQUEST['Approval']=='Approval')
  {
    include 'Approval.php';
  }
  else if($_REQUEST['Reject']=='Reject')
  {
    include 'Reject.php';
  } 
}
header("location:pi_page.php?op=approval&search=click");
?>