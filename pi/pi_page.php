
<?php 

include '../include/connection.php';

session_start();
if(!isset($_SESSION['Employee']) || $_COOKIE['user_role']!="pi")
{
  header("location:../logout.php");
}
 ?>
<script src="jquery-1.4.2.min.js"></script>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="cssstyles.css" />
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../css/style.css">


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
<!--
<link rel="stylesheet" type="text/css" href="cssstyles.css" />
-->

<meta charset="UTF-8">

<title>PI page</title>
</head>

<body>

<div class="container">
<div style="display:table-row">
<div class="menu bar dist-top" style="display:table-cell;width:300px;  ">
  <table width="200" class="table tab-border table-hover">
  <tr>
    <td><span class="menu bar" style=" float:left"><span class="menu bar" style=" float:left"><img src="css/image/logo.png" width="300" height="83"></span></span></td>
  </tr>
  <tr>
    <td><div align="center"><a href="pi_page.php?op=quotation">Quotation</a></div></td>
  </tr>
  <tr>
    <td><div align="center"><a href="pi_page.php?op=approval">Approval</a></div></td>
  </tr>
    <tr>
    <td><div align="center"><a href="../logout.php">Logout</a></div></td>
  </tr>
</table>
</div>
<div class="top menu" style="display:table-cell;width:auto;">
  <div class="header" align="center">
  <table width="700" class="table tab-border table-striped">
    <tr>
      <td width="342">Employee Name :<?php echo $_SESSION['Employee']; ?> </td>
      <td width="342" id="demo"> 
<script>
var d = new Date();
document.getElementById("demo").innerHTML = "Date : " + d.toDateString();
</script>
 </td>
    </tr>
    <tr>
      <td>Role<span style="margin-left:85px"> :<?php echo $_SESSION['role']; ?></span> </td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <p>&nbsp;</p>
  </div>
 
 <?php
if($_REQUEST['op']=='quotation' || $_REQUEST['op']=='approval')
{

?> 
  
<div class="search" align="center">
  <form name="form2" method="post" action="pi_page.php?op=<?php echo $_REQUEST['op']; ?>&search=click">
      <table width="700" class="table tab-border">
      <tr>
        <td width="612" height="33">Project Name : 
          <input type="text" placeholder="Project Name" name="project_name"></td>
        <td width="612">
          </td>
      </tr>
      <tr>
        <td>Project ID<span style="margin-left:28px"> : 
          <input type="text" placeholder="Project ID" name="project_id"></span></td>
        <td><input name="search_submit" type="submit" class="style3 btn btn-primary" value="Search" /></td>
      </tr>
    </table>
	</form>
  </div>
  
  <?php }?>
<div class="search_table" align="center">
  <p>&nbsp;</p>
  <table width="700" class="table tab-border table-hover">
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
        include 'clicktable.php';
      }
      else if($_REQUEST['op']=='quotation' && @$_REQUEST['search']=='click')
      {
        include 'another.php'; 
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
  if($_REQUEST['op']=='quotation' && @$_REQUEST['search']=='click' && @$_REQUEST['po']=='click')
  {


  if(isset($_REQUEST['quote']))
  {
      $quote_no=$_REQUEST['quote']+1;
      if(@$_REQUEST['wo']=='create')
      {
       include 'insertion.php';     
      }  

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
  <form name="form4" method="post" action="pi_page.php?op=<?php echo $_REQUEST['op']; ?>&search=click&pn=<?php echo $_SESSION['project_name']; ?>&or=<?php echo $_SESSION['order'];?>&po=click&wo=create&quote=<?php echo $quote_no; ?>" onsubmit="return val1();">
    <p>
     <?php include 'quote_table.php'; ?>
    </p>
	
	<table width="700" class="table tab-border table-striped">
  <tr>
    <td>Sno</td>
    <td>Description</td>
    <td>Quantity</td>
    <td>Rate</td>
    <td>Total</td>
  </tr>
  <?php include 'description.php' ?>
  </table>
  <?php 
  include 'file.php';
  ?>
    <p>
      <textarea name="Quote_comment" cols="50" rows="4" maxlength="200" placeholder="Comment Here"></textarea>
    </p>
    <p>
      
      
      <input name="quote_submit" type="submit" class="btn btn-primary" class="style3" value="Submit" />
      </p>
  </form>



</div>

<?php
}
if($quote_no==4)
{
  header("location:pi_page.php?op=quotation&search=click");
}

}
if($_REQUEST['op']=='approval' && @$_REQUEST['search']=='click' && @$_REQUEST['po']=='click' && @$_REQUEST['st_click']!='click')
{
  //Here the code for all pictures will come ......

include 'stg_status.php';
            
}

if($_REQUEST['op']=='approval' && @$_REQUEST['search']=='click' && @$_REQUEST['po']=='click' && @$_REQUEST['st_click']=='click')
{            
            include 'stg_status_click.php';
           
?>
<center>
      <?php
  $pid=$_REQUEST['pn']. '/' . $_REQUEST['or']. '/' . $_REQUEST['st'];


            $path="../si/upload/uploads/$pid";
          //  echo "<script>alert('$path')</script>";
            $file_display = array('jpg', 'jpeg', 'png', 'gif');
            if(is_dir($path))
            {
            $files_count= count(glob($path.'/'.'*'));
         //  echo "<script>alert('lol')</script>";
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

?><br>
<br>

<p>&nbsp;</p>
</center> 

<br>
<br>
<form name='form5' method="post" action="ap_com.php?op=<?php echo $_REQUEST['op']; ?>&search=click&pn=<?php echo $_SESSION['project_name']; ?>&or=<?php echo $_SESSION['order'];?>&com=comment&st=<?php echo $_SESSION['stg_id'];?>&st_click=click" onsubmit='return val2()'>
     <p>
      <textarea name="St_comment" cols="50" rows="4" maxlength="200" placeholder="Comment Here"></textarea>
    </p>
  
    <input type="submit" value="Approval" class="btn btn-primary" name="Approval"> &nbsp;
    <input type="submit" value="Reject"  class="btn btn-primary" name="Reject">
</form>  
<?php

}


?>

</div>
</center>
</div></div>

<?php include '../include/footer.php'; ?>
</body>
<script type="text/javascript">
function val1() {
  // body...
  if(document.form4.Quote_comment.value=='')
  {
    alert('Please enter the comment');
    return false;
  }
else
  return true;
}
function val2()
{
  if(document.form5.St_comment.value=='')
  {
    alert('Please enter the comment...');
    return false;
  }
  else
  return true;
}

</script>
</html>