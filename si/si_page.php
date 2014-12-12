<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../css/style.css">
<?php session_start(); 
if(!isset($_SESSION['Employee'])|| $_COOKIE['user_role']!="si")
{
  header("location:../logout.php");
}
?>

<script type="text/javascript">
function validate_form1()
{
for (i=1;i<=$('#num_cat').val();i++) {
if(document.forms["form4"]["description-"+i].value=="")
{
alert("Please Enter The Description");
return false;
}
else if(document.forms["form4"]["quantity-"+i].value=="")
{
alert("Please Enter The Quantity");
return false;
}
}
return true;
}
</script>




<script src="jquery-1.4.2.min.js"></script>

<!DOCTYPE html>
<html>

<head>

<link rel="stylesheet" type="text/css" href="cssstyles.css" />

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

<title>SI page</title>
</head>

<body>

<div style="display:table; width:100%;">
<div style="display:table-row">
<div class="menu bar" style="display:table-cell;width:300px;  ">
  <table width="200" class="table-bordered table-hover">
  <tr>
    <td><span class="menu bar" style=" float:left"><span class="menu bar" style=" float:left"><img src="../css/image/logo.png" width="300" height="83"></span></span></td>
  </tr>
  <tr>
    <td><div align="center"><a href="si_page.php?op=overview">Overview</a></div></td>
  </tr>
  <tr>
    <td><div align="center"><a href="si_page.php?op=approval">Approval</a></div></td>
  </tr>
    <tr>
    <td><div align="center"><a href="../logout.php">Logout</a></div></td>
  </tr>
</table>
</div>
<div class="top menu" style="display:table-cell;width:auto;">
  <div class="header" align="center">
  <table width="700" class="table table-bordered">
    <tr>
      <td width="342">Employee Name : <?php echo $_SESSION['Employee'];?> </td>
      <td width="342" id="demo"> 
<script>
var d = new Date();
document.getElementById("demo").innerHTML = "Date : " + d.toDateString();
</script>
 </td>
    </tr>
    <tr>
      <td>Role : <?php echo $_SESSION['role'];?></td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <p>&nbsp;</p>
  </div>
 
 <?php
if($_REQUEST['op']=='overview' || $_REQUEST['op']=='approval' )
{

?> 
  
<div class="search" align="center">
  <form name="form2" method="post" action="si_page.php?op=<?php echo $_REQUEST['op']; ?>&search=click">
      <table width="700" class="table-bordered">
      <tr>
        <td width="612" height="33">Project Name : 
          <input type="text" placeholder="Project Name" name="project_name"></td>
        <td width="612">Status :<label>
              <select name="status" id="status">
                <option value="">Choose</option>  
                <option value="Project created">Project created</option>
                <option value="Request for overview">Request for overview</option>
                <option value="Create overview">Create overview</option>
                <option value="overview approval">overview approval</option>
                <option value="WO created">WO created</option>
                <option value="PO created">PO created</option>
              </select>
              </label>
          
          </td>
      </tr>
      <tr>
        <td>Project ID : 
          <input type="text" placeholder="Project ID" name="project_id"></td>
        <td><input name="search_submit" type="submit" class="style3" value="Search" /></td>
      </tr>
    </table>
	</form>
  </div>
  
  <?php }?>
<div class="search_table" align="center">
  <p>&nbsp;</p>
  <table width="700" class="table-bordered table-hover">
    <tr>
      <td>Project Name </td>
      <td>Project ID </td>
      <td>Status</td>
      <td>Date</td>
      <td>Order </td>
     
    </tr>
    <?php 
    if(@$_REQUEST['search']=='click' && @$_REQUEST['po']=='click')
    {
      include 'clicktable.php';  
    }
    else
     { 
      include 'another.php'; 
    }
   ?>

  <p>&nbsp;</p>
  </table>
  <?php
  if($_REQUEST['op']=='overview' && @$_REQUEST['search']=='click' && @$_REQUEST['po']=='click')
  {

    
  ?>

  </div>
  <br>
  <?php include 'wo_desc.php'; ?>
  <br/>
  <?php include 'stage_table.php';?>
<br>

<?php 
        if(@$_REQUEST['st_click']=='click')
         // include 'stage_upload.php';
        {
          $_SESSION['or_upload']=$_REQUEST['or'];
        //  $r=$_SESSION['or_upload'];
          $_SESSION['pr_upload']=$_REQUEST['pn'];
          $_SESSION['st_upload']=$_REQUEST['st'];
         // echo "<script>alert('$r')</script>";
          include 'upload/index.php';
        }
?>
<!--

<div class="file_boxes">

</div>
<span id="removed_files"></span>
<br>
<p>&nbsp;</p>
<p>&nbsp;</p>
-->


<?php
}
?>

</div>
</div></div>
<?php

if(@$_REQUEST['op']=='wo_po' && @$_REQUEST['search']=='click'  && @$_REQUEST['po']=='click' && @$_REQUEST['wo']=='create')
{
   include 'stage.php';
    
    if(empty($insert))
      {
        echo "failed";
      }
      else
      {
         echo "<script>alert('stage table updated');</script>";
         
      }
}
if(@$_REQUEST['op']=='approval' && @$_REQUEST['search']=='click'  && @$_REQUEST['po']=='click')
{

            $pid=$_REQUEST['pn'];
            $path="../si/uploaded_files/$pid";
            $file_display = array('jpg', 'jpeg', 'png', 'gif');
            if(is_dir($path))
            {
            $files_count= count(glob("$path./*"));

?>
<center>
<div id="container">
  <ul>
      
          <?php
            if($dir_list=opendir($path))
            {
              while (($filename = readdir($dir_list)) !== false) {
              $ex=strtolower(end(explode('.', $filename)));

              if(in_array($ex, $file_display)==true)
              {

            echo  "<li><img src='$path/$filename' width='604' height='453'/></li>";
              }
            }
          }
       
            
            ?>
      </ul>
      <span class="button prevButton"></span>
      <span class="button nextButton"></span></div>
    </center>
      <?php

}
?>

 
<form method="POST" name="comment" action="si_page.php?op=<?php echo $_REQUEST['op']; ?>&search=click&pn=<?php echo $_SESSION['project_name']; ?>&or=<?php echo $_SESSION['order'];?>&com=comment " onsubmit="return val() ">
     <p>
      <textarea name="St_comment" cols="50" rows="4" maxlength="200" placeholder="Comment Here"></textarea>
    </p>
    
    <input type="submit" value="Approval" name="Approval"> 
    <input type="submit" value="Reject" name="Reject">
</form>  
<?php
}
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
        $_SESSION['second_login_count']=1;
?>
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
</body>
</html>

