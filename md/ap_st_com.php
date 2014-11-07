<?php
  
  if(@$_REQUEST['approval']=='Approval')
   {
      include 'stage_approval.php';
   }
   elseif(@$_REQUEST['reject']=='Reject')
   {
      include 'stage_reject.php';
   }
header("location:md_page.php?op=approval&search=click");
?>