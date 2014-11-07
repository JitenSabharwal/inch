<?php
session_start();
include 'connection.php';
if(@$_REQUEST['com']=='comment')
{
  if($_REQUEST['Approval']=='Approval')
  {
    include 'Approval_stage.php';
  }
  else if($_REQUEST['Reject']=='Reject')
  {
    include 'Reject_stage.php';
  }
}
header("location:fs_page.php?op=approval&search=click");
?>