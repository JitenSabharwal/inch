<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../css/style.css">
<?php 
session_start();
include 'connection.php';
if(!isset($_SESSION['Employee']) || $_COOKIE['user_role']!="fs")
{
  header("location:../logout.php");
}
 ?>
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
<script src="jquery-1.4.2.min.js"></script>

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

<title>FS page</title>
</head>

<body>

<div style="display:table; width:100%;">
<div style="display:table-row">
<div class="menu bar" style="display:table-cell;width:300px;  ">
  <table width="200" class="table-bordered table-hover">
  <tr>
    <td><span class="menu bar" style=" float:left"><span class="menu bar" style=" float:left"><img src="css/image/logo.png" width="300" height="83"></span></span></td>
  </tr>
  <tr>
    <td><div align="center"><a href="fs_page.php?op=overview">Overview</a></div></td>
  </tr>
  <tr>
    <td><div align="center"><a href="fs_page.php?op=approval">Approval</a></div></td>
  </tr>
    <tr>
    <td><div align="center"><a href="../logout.php">Logout</a></div></td>
  </tr>
</table>
</div>
<div class="top menu" style="display:table-cell;width:auto;">
  <div class="header" align="center">
  <table width="700" class="table-bordered">
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
      <td>Role :<?php echo $_SESSION['role']; ?> </td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <p>&nbsp;</p>
  </div>
 
 <?php
if($_REQUEST['op']=='overview' || $_REQUEST['op']=='approval')
{

?> 
  
<div class="search" align="center">
  <form name="form2" method="post" action="fs_page.php?op=<?php echo $_REQUEST['op']; ?>&search=click">
      <table width="700" class="table-bordered">
      <tr>
        <td width="612" height="33">Project Name : 
          <input type="text" placeholder="Project Name" name="project_name"></td>
        <td width="612">
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
      if($_REQUEST['op']=='overview' && @$_REQUEST['search']=='click' && @$_REQUEST['po']=='click')
      {
        include 'Project_table_click.php';
      }
      elseif($_REQUEST['op']=='overview' && @$_REQUEST['search']=='click')
      {
        include 'Project_table.php'; 
      } 
      if($_REQUEST['op']=='approval' && @$_REQUEST['search']=='click')
      {
          include 'Approval_table.php';
      }
      if($_REQUEST['op']=='approval' && @$_REQUEST['search']=='click' && @$_REQUEST['po']=='click')
      {
          include 'Approval_click.php';
      }

      ?> 
    
  </table>
  </div>
  <p>&nbsp;</p>
  <?php
  ######################################################################### Overview ############################################################################
  if($_REQUEST['op']=='overview' && @$_REQUEST['search']=='click' && @$_REQUEST['po']=='click')
  {
                  if(isset($_REQUEST['quote']))
                  {
                      $quote_no=$_REQUEST['quote']+1;
                      if(@$_REQUEST['wo']=='create')
                          {
                           // include 'insertion.php';     
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
                <p>Quote</p>

                  <form name="form4" method="post" action="ap_ho.php?op=<?php echo $_REQUEST['op']; ?>&search=click&pn=<?php echo $_SESSION['project_name']; ?>&or=<?php echo $_SESSION['order'];?>&po=click&wo=create" onsubmit="return confirm1();">
                    <p>
                      <?php include 'quote_table.php';//this tale is for vendor details ?> 
                    </p>
                	
<?php 
                    include 'description.php';//this table gives details of rate ,quan,total  
                  $w=substr($_REQUEST['or'],0,1);  
                  if($w=='W')
                   { 
                       include 'stage_table.php';//this gives us details about stages in that wok_order; 
                   }
       
 ?>
                    <p>
                      <textarea name="FS_comment" cols="50" rows="4" maxlength="200" placeholder="Comment Here"></textarea>
                    </p>
                    <p> 
                      
                      
                      <input name="quote_submit" type="submit" class="style3" value="Approve" />
                      <input name="quote_submit" type="submit" class="style3" value="Hold" />
                      </p>
                  </form>



                </div>

<?php
                }
}

  ######################################################################### Overview  OVER ############################################################################

  ######################################################################### Approval ############################################################################
if($_REQUEST['op']=='approval' && @$_REQUEST['search']=='click' && @$_REQUEST['po']=='click'&& @$_REQUEST['st_click']!='click')
  {
      include 'stg_status.php';
  }
if($_REQUEST['op']=='approval' && @$_REQUEST['search']=='click' && @$_REQUEST['po']=='click' && @$_REQUEST['st_click']=='click')
  {
         include 'stg_status_click.php';      
          $pid=$_REQUEST['pn'];
            $path="../si/uploaded_files/$pid";
            $file_display = array('jpg', 'jpeg', 'png', 'gif');
            if(is_dir($path))
            {
            $files_count= count(glob("$path./*"));

?>
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
              <?php

    }
?>

<br>
<br>
<br>
<table border=1  width=500px>
  
  <tr>
    <th>
      S.No.
    </th>
    <th>
        Authority
    </th>
    <th>
      Comment
    </th>   
  </tr>
  <?php include'comment.php'; ?>
</table>
<br>
<br>

<form method="POST"  name="comment" action="ap_st_com.php?op=<?php echo $_REQUEST['op']; ?>&search=click&pn=<?php echo $_SESSION['project_name']; ?>&or=<?php echo $_SESSION['order'];?>&com=comment&st=<?php echo $_SESSION['stg_id'];?>&st_click=click" onsubmit="return val()">
     <p>
      <textarea name="St_comment" cols="50" rows="4" maxlength="200" placeholder="Comment Here"></textarea>
    </p>
    
    <input type="submit" value="Approval" name="Approval"> 
    <input type="submit" value="Reject" name="Reject">
</form>  
<?php
}
?>
</div>
</div></div>
</body>

<script>
function confirm1()
{
  if(document.form4.FS_comment.value=='')
  {
    alert('Please enter the comment');
    return false;
  }
   else if(confirm("Are you Sure You want to continue?"))
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

