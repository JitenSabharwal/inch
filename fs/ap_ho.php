<?php
session_start();
include 'connection.php';
if(@$_REQUEST['quote_submit']=='Approve')
{
  
  include 'approval.php';
}
else if(@$_REQUEST['quote_submit']=='Hold')
{
  include 'hold.php';
}
header("location:fs_page.php?op=overview");
?>