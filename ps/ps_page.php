<?php include "../include/connection.php"; ?>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../css/style.css">
<link rel="stylesheet" type="text/css" href="cssstyles.css" />

<?php
session_start();
if(!isset($_SESSION['Employee']) || $_COOKIE['user_role']!="ps")
{
  header("location:../logout.php");
}


?>

<script>
function confirm1()
{
   var phone_no=/^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$/;
   var landline = /^([0-9]{1,5}[\-]{1}[0-9]{7})$/;

   var quote1=document.getElementById('quote_table').rows.length;

  if(document.form4.vendor_name.value=='')
  {
    alert('Please Fill the name...');
    return false;
  }
  if(document.form4.contact_no.value=='' || (phone_no.test(document.form4.contact_no.value)==false && landline.test(document.form4.contact_no.value)==false))
  {
    alert('Please Fill Correct contact no\nLandline No should be in format : STD Code-Phone No ');
    return false;
  }
  if(1)
  {
    for (i=1;i<quote1;i++)
 {
  
if(document.forms["form4"]["rate"+i].value=="")
{
alert("Please Enter rate in row "+i);
return false;
}
}

  }
 

  else 
  {
    if(confirm("Are you Sure You want to continue!"))
    {
      return true;
    }
    else
    {
      return false;
    }
  }

}
function confirm2()
{
   var x=document.getElementById('myTable').rows.length;
for (i=1;i<x;i++)
 {
  
if(document.forms["form5"]["description-"+i].value=="")
{
alert("Please Enter The Description in row "+i);
return false;
}
else if(document.forms["form5"]["percentage-"+i].value=="")
{
alert("Please Enter The percentage value in row "+i);
return false;

}
}
  if(confirm("Are you Sure You want to continue!"))
    {
      return true;
    }
    else
    {
      return false;
    }
}   
</script>

<script type="text/javascript">
function refresh()
{

  var u=document.URL;
  var sl=u.slice(-19);

  if(sl=="&po=click&wo=create")

   window.location="ps_page.php?op=quotation&search=click";
}

</script>




<script src="jquery-1.4.2.min.js"></script>

<!DOCTYPE html>
<html>

<head>
<!--
<link rel="stylesheet" type="text/css" href="cssstyles.css" />
-->
<style> 
body {
/*  background: url(../random-login-form/css/image/wallpaper2.jpeg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;*/
        width:80%;
        margin-left:auto;
        margin-right:auto;
        background: #eee;
}
</style>

<script type="text/javascript" src="js/jquery_1.5.2.js"></script>
<script type="text/javascript" src="js/uploader.js"></script>


<link type="text/css" href="css/uploader.css" rel="stylesheet" />


<script type="text/javascript">
$(document).ready(function()
{
	new multiple_file_uploader
	({
		form_id: "fileUpload", 
		autoSubmit: true,
		server_url: "uploader.php" // PHP file for uploading the browsed files
	});
});
</script>



<script>
$(window).load(function(){
    var pages = $('#container li'), current=0;
    var currentPage,nextPage;

    $('#container .button').click(function(){
      currentPage= pages.eq(current);
      if($(this).hasClass('prevButton'))
      {

        if (current <= 0)
          current=pages.length-1;
        else
          current=current-1;
      }
      else
      {
        if (current >= pages.length-1)
          current=0;
        else
          current=current+1;
      }
      nextPage = pages.eq(current); 
      currentPage.hide(); 
      nextPage.show();    
    });
});

</script>


<meta charset="UTF-8">

<title>PS page</title>
</head>

<body onload="refresh()">

<div class="container">
<div style="display:table-row">
<div class="menu bar dist-top" style="display:table-cell;width:300px;  ">
  <table width="200" class="table tab-border table-hover">
  <tr>
    <td><span class="menu bar" style=" float:left"><span class="menu bar" style=" float:left"><img src="css/image/logo.png" width="300" height="83"></span></span></td>
  </tr>
  <tr>
    <td><div align="center"><a href="ps_page.php?op=quotation">Quotation</a></div></td>
  </tr>
    <tr>
    <td><div align="center"><a href="ps_page.php?op=wo_po">PO / WO Preparation</a></div></td>
  </tr>
  <tr>
    <td><div align="center"><a href="ps_page.php?op=approval">Approval</a></div></td>
  </tr>
    <tr>
    <td><div align="center"><a href="../logout.php">Logout</a></div></td>
  </tr>
</table>
</div>
<div class="top menu" style="display:table-cell;width:auto;">
  <div class="header">
  <table width="700" class="tab-border table table-striped">
    <tr>
      <td width="342">Employee Name :<?php echo $_SESSION['Employee'];?> </td>
      <td width="342" id="demo"> 
<script>
var d = new Date();
document.getElementById("demo").innerHTML = "Date : " + d.toDateString();
</script>
 </td>
    </tr>
    <tr>
      <td>Role<span style="margin-left:85px"> : <?php echo $_SESSION['role'] ;?></span></td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <p>&nbsp;</p>
  </div>
 
 <?php
if($_REQUEST['op']=='quotation' || $_REQUEST['op']=='approval' || $_REQUEST['op']=='wo_po')
{

?> 
  
<div class="search" align="center">
  <form name="form2" method="post" action="ps_page.php?op=<?php echo $_REQUEST['op']; ?>&search=click">
      <table width="700" class="tab-border table">
      <tr>
        <td width="612" height="33">Project Name : 
          <input type="text" placeholder="Project Name" name="project_name"></td>
        <td width="612"><label>
              </label>
          
          </td>
      </tr>
      <tr>
        <td>Project ID  <span style="margin-left:28px">:
          <input type="text" placeholder="Project ID" name="project_id"></span></td>
        <td><input name="search_submit" type="submit" class="style3 btn btn-primary" value="Search" /></td>
      </tr>
    </table>
	</form>
  </div>
  
  <?php
   }

   ?>
<div class="search_table" align="center" >
  <p>&nbsp;</p>
  <table width="700" class="tab-border table-hover table">
    <tr>
      <td>Project Name </td>
      <td>Project ID </td>
      <td>Status</td>
      <td>Date</td>
      <td>Order </td>
    </tr>
    <?php 
    if($_REQUEST['op']=='quotation' && @$_REQUEST['search']=='click' && @$_REQUEST['po']=='click')
    {
      include 'Project_table_click.php';
    }
    else if($_REQUEST['op']=='quotation' && @$_REQUEST['search']=='click')
    {
      include 'Project_table.php';
    }
    if(@$_REQUEST['op']=='wo_po' && @$_REQUEST['search']=='click' && @$_REQUEST['po']=='click')
    {
      include 'wopo_click.php';
    }
    elseif (@$_REQUEST['op']=='wo_po' && @$_REQUEST['search']=='click')
     {
        include 'wopo_table.php';
    }
    if($_REQUEST['op']=='approval' && @$_REQUEST['search']=='click' && @$_REQUEST['po']=='click')
      {
          include 'approval_click.php';
      } 
    else if($_REQUEST['op']=='approval' && @$_REQUEST['search']=='click')
      {
          include 'approval_table.php';
      }
 ?>
    
</table>
</div>
<p>&nbsp;</p>

  <?php
 ################################################################# Quotation ##################################################################################
 
  if($_REQUEST['op']=='quotation' && @$_REQUEST['search']=='click' && @$_REQUEST['po']=='click')
  {
   
  
                    if(isset($_REQUEST['quote']))
                    {
                      if(@$_REQUEST['wo']=='create')
                      {
                        include 'quote.php';     
                      }  

                      $quote_no=$_REQUEST['quote']+1;
                    }
                    else
                    {
                      $quote_no=1;
                    }
                    if($quote_no!=4)
                    {
   ?>
                    
                    <div class="quote" align="center">
                  <p>Quote<?php echo $quote_no; ?></p>
                    <form name="form4"  method="post" action="ps_page.php?op=<?php echo $_REQUEST['op']; ?>&search=click&pn=<?php echo $_SESSION['project_name'] ;?>&or=<?php echo $_SESSION['order'];?>&po=click&wo=create&quote=<?php echo $quote_no; ?>" onsubmit="return confirm1();">
                      <p>Vendor Name : <input type="text" placeholder="Vendor Name" name="vendor_name"> Contact No : <input type="text" placeholder="Contact No" name="contact_no"></p>
                  	
                  	<table width="700" id="quote_table" class="tab-border table-hover table" id="desc">
                    <tr>
                      <td>Sno</td>
                      <td>Description</td>
                      <td>Quantity</td>
                      <td>Rate</td>
                      <td>Total</td>
                    </tr>
   <?php include 'description.php'; ?>
                   </table>

                      <input name="quote_submit" type="submit" class="style3 btn btn-primary" value="Submit" />
                    </form>



                  </div>

   <?php
                  }
                  if($quote_no==4)
                  {
                     $_SESSION['or_upload']=$_REQUEST['or'];
                     $_SESSION['pr_upload']=$_REQUEST['pn'];
                    @include 'upload/index.php';

   ?>

                 




 <?php
                  }
}
################################################################# Quotation Over ##################################################################################

 ################################################################# Wo/Po ##################################################################################

if(@$_REQUEST['op']=='wo_po' && @$_REQUEST['search']=='click' && @$_REQUEST['po']=='click')
{
?>

                  <div class="wo_po" align="center">
                  <form name="form5" method="post" action="st_in_status.php?op=<?php echo $_REQUEST['op']; ?>&search=click&pn=<?php echo $_SESSION['pn'];?>&or=<?php echo $_SESSION['order'];?>&po=click&wo=create" onSubmit="return confirm2()">
                    
                    <p><?php include 'quote_table.php';?></p>
                	
                	<table width="700" class="tab-border table" id="mytable">
                      <tr>
                        <td>Sno</td>
                        <td>Description</td>
                        <td>Quantity</td>
                        <td>Rate</td>
                        <td>Total</td>
                      </tr>

  <?php include 'po_wodesc.php'; ?>
                
                </table>


  <?php

                  $w=substr($_REQUEST['or'],0,1);

                  if($w=="W")
                    {
                      include 'dynamic_textfield1.php';
                    }
   ?>
                </p>

                    <input name="wo_po_submit" type="submit" class="style3 btn btn-primary" value="Submit" />
                    
                  </form>



                </div>


<?php
}
 ################################################################# Wo/Po Over ##################################################################################

?>
<center>
<?php
 ################################################################# Approval ##################################################################################

if(@$_REQUEST['op']=='approval' && @$_REQUEST['search']=='click' && @$_REQUEST['po']=='click' && @$_REQUEST['st_click']!='click')
{
  include 'stg_status.php';
}
if(@$_REQUEST['op']=='approval' && @$_REQUEST['search']=='click' && @$_REQUEST['po']=='click' && @$_REQUEST['st_click']=='click')
{
     include 'stg_status_click.php';      

  $pid=$_REQUEST['pn']. '/' . $_REQUEST['or']. '/' . $_REQUEST['st'];


            $path="../si/uploads/$pid";
           //  echo "<script>alert('$path')</script>";
            $file_display = array('jpg', 'jpeg', 'png', 'gif');
            if(is_dir($path))
            {
            $files_count= count(glob($path.'/'.'*'));
         //   echo "<script>alert('lol')</script>";
            ?>

<div id="container">

<ul>
          <?php
            if($dir_list=@opendir($path))
            {
              while (($filename = readdir($dir_list)) !== false) {
                
              $ex=explode('.', $filename);
             @include '../file_search.php';
              if(@$valid==1)
              {

              if(in_array($ex[1], $file_display)==true)
              {

            echo  "<li><img src='$path/$filename' width='604' height='453'/></li>";
              }
            }
          } 
           $arr = explode(".", $filename, 2);  
                    $_SESSION['filename'] = $arr[0];
                      
          }
       
            
            ?>
      </ul>
      <span class="button prevButton"></span>
      <span class="button nextButton"></span></div>
      <?php
}

?>
 <br>
 <br>
<form method="POST" action="ap_stage.php?op=<?php echo $_REQUEST['op']; ?>&search=click&pn=<?php echo $_SESSION['project_name']; ?>&or=<?php echo $_SESSION['order'];?>&com=comment&st=<?php echo $_SESSION['stg_id'];?>&st_click=click" onsubmit="return val();">
     <p>
      <textarea name="St_comment" cols="50" rows="4" maxlength="200" placeholder="Comment Here"></textarea>
    </p>
    
    <input type="submit" value="Approval" class="btn btn-primary" name="Approval"> 
    <input type="submit" value-"Reject" class="btn btn-primary" name="Reject">
</form>  
<?php
}
 ################################################################# Approval Over ##################################################################################
?>
</div>
</div></div>
</body>
<script type="text/javascript">
function val () {
  // body...
  if(document.comment.St_comment.value=='')
  {
    alert('Please enter the comment');
    return false;
  }
else
  return true;
}

</script>
</html>
<?php
  //  $_SESSION['second_login_count']=1;
?>


