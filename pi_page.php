<?php 
session_start();
include 'connection.php' ?>
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


<meta charset="UTF-8">

<title>PI page</title>
</head>

<body>

<div style="display:table; width:100%;">
<div style="display:table-row">
<div class="menu bar" style="display:table-cell;width:300px;  background:green;">
  <table width="200" border="1">
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
    <td><div align="center"><a href="../logout.php/pi">Logout</a></div></td>
  </tr>
</table>
</div>
<div class="top menu" style="display:table-cell;width:auto;background:red;">
  <div class="header" align="center">
  <table width="700" border="1">
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
if($_REQUEST['op']=='quotation' || $_REQUEST['op']=='approval')
{

?> 
  
<div class="search" align="center">
  <form name="form2" method="post" action="pi_page.php?op=<?php echo $_REQUEST['op']; ?>&search=click">
      <table width="700" border="1">
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
  <table width="700" border="1">
    <tr>
      <td>Project Name </td>
      <td>Project ID </td>
      <td>Status</td>
      <td>Date</td>
      <td>Initiated By </td>
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
    
  </table>
  </div>
  <p>&nbsp;</p>
  <?php
  if($_REQUEST['op']=='quotation' && $_REQUEST['search']=='click' && @$_REQUEST['po']=='click')
  {
  if(isset($_REQUEST['quote']))
  {
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
  <form name="form4" method="post" action="pi_page.php?op=<?php echo $_REQUEST['op']; ?>&search=click&pn=project1&po=click&wo=create&quote=<?php echo $quote_no; ?>">
    <p>Vendor Name : <input type="text" placeholder="Vendor Name" name="vendor_name"> Contact No : <input type="text" placeholder="Contact No" name="contact_no"></p>
	
	<table width="700" border="1">
  <tr>
    <td>Sno</td>
    <td>Description</td>
    <td>Quantity</td>
    <td>Rate</td>
    <td>Total</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

    <p>
      <textarea name="Quote_comment" cols="50" rows="4" maxlength="200" placeholder="Comment Here"></textarea>
    </p>
    <p>
      
      
      <input name="quote_submit" type="submit" class="style3" value="Submit" />
      </p>
  </form>



</div>

<?php
}

}

?>

</div>
</div></div>
</body>
</html>