<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../css/style.css">
<!--connecting to the dtabase-->
<?php 
session_start();
include 'connection.php';
if(!isset($_SESSION['Employee'])||$_COOKIE['user_role']!="client")
{
  header("location:../client.php");
}
  
?>

    <script type="text/javascript" src="./jquery-1.4.2.min.js" ></script>

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
<meta charset="UTF-8">

<title>Client page</title>
</head>

<body onload="refresh();">

<div style="display:table; width:100%;">
<div style="display:table-row">
<div class="menu bar" style="display:table-cell;width:300px; ">
  <table width="200" class="table table-bordered table-hover">
  <tr>
    <td><span class="menu bar" style=" float:left"><span class="menu bar" style=" float:left"><img src="css/image/logo.png" width="300" height="83"></span></span></td>
  </tr>
  <tr>
    <td><div align="center"><a href="client.php?op=overview">Overview</a></div></td>
  </tr>
   <tr>
    <td><div align="center"><a href="../logout.php">Logout</a></div></td>
  </tr>
</table>
</div>
<div class="top menu" style="display:table-cell;width:auto;">
  <div class="header" align="center">
  <table width="700" border="1">
    <tr>
      <td width="342">Employee Name : 

<?php 
      echo $_SESSION['Employee'];
?>
</td>
      <td width="342" id="demo"> 
<script>
var d = new Date();
document.getElementById("demo").innerHTML = "Date : " + d.toDateString();
</script>
 </td>
    </tr>
    <tr>
      <td>Role :   <?php 
      echo @$_SESSION['role'];
      ?></td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <p>&nbsp;</p>
  </div>
 
 
<?php
if(@$_REQUEST['op']=='overview')  
{
  ?> 
  <table width="700" class="table table-bordered table-hover">
    <tr>
      <td>Project Name </td>
      <td>Project ID </td>
      <td>Status</td>
      <td>Date</td>
    </tr>
     
     <?php 
}
    
if(@$_REQUEST['op']=='overview' && @$_REQUEST['search']=='click' && @$_REQUEST['po']=='click')
{
  include 'Project_table_click.php';
}
else if(@$_REQUEST['op']=='overview')
{
     include 'Project_table.php';
}
 ?>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  </table> 
<?php   
###############################
################################################################ OVERVIEW  ################################################################################

if(@$_REQUEST['op']=='overview' && @$_REQUEST['search']=='click' && @$_REQUEST['po']=='click')
{
?>
 
  
  <center>

      <?php
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
                              if($dir_list=@opendir($path))
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

<p>&nbsp;</p>

 
</center>
<?php
 
}
################################################################ OVERVIEW OVER ################################################################################


     
?>

</div>
</div>
</div>
</div>
</body>
</html>