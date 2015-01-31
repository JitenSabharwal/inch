<?php
session_start();
include '../include/connection.php';
if(@$_REQUEST['com']=='comment')
{
  if($_REQUEST['Approval']=='Approval')
  {
    include 'Approval.php';
  }
  else if($_REQUEST['Reject']=='Reject')
  {
    include 'Reject.php';
  }
}
header("location:pm_page.php?op=Approval&search=click");

?>