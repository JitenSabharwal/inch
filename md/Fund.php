<?php
session_start(fund);
include '../include/connection.php';  


			if(@$_REQUEST['approval']=='Approval')
              {
                include 'funds_approval.php';
              }
             
            else if(@$_REQUEST['reject']=='Reject')
              {
                include 'funds_reject.php';
              }

session_destroy(fund);

header("location:md_page.php?op=approval&search=click");
?>