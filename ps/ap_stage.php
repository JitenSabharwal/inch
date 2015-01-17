<?php

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
header("location:ps_page.php?op=approval&search=click");
?>