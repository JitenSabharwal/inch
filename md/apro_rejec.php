<?php
session_start();
include 'connection.php';
if($_REQUEST['status']=='funds')
{
	if(@$_REQUEST['approval']=='Approval')
	  {
	    include 'approval.php';
	  }
	else if(@$_REQUEST['reject']=='Reject')
	  {
	    include 'reject.php';
	  }
}
if ($_REQUEST['status']=='stage') 
{
  
  if(@$_REQUEST['approval']=='Approval')
   {
      include 'stage_approval.php';
   }
   elseif(@$_REQUEST['reject']=='Reject')
   {
      include 'stage_reject.php';
   }
}
header('location:md_page.php?op=approval');
?>
