<?php include '../include/connection.php'; ?>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../css/style.css">
<!--connecting to the dtabase-->
<?php 
session_start();
if(!isset($_SESSION['Employee']) || $_COOKIE['user_role']!="pm")
{
  header("location:../logout.php");
}

  
?>

    <script type="text/javascript" src="./jquery-1.4.2.min.js" ></script>
    <script type="text/javascript">
var intTextBox=0;

//FUNCTION TO ADD TEXT BOX ELEMENT
function addElement()
{
intTextBox = intTextBox + 1;
/*var contentID = document.getElementById('content');
var newTBDiv = document.createElement('div');
newTBDiv.setAttribute('id','strText'+intTextBox);
var html = '<table width="200" border="1"><tr><th scope="col">Sno</th><th scope="col">Description</th><th scope="col">Quality</th><th scope="col">Type</th></tr>';*/

    var table = document.getElementById("myTable");
    var row = table.insertRow(intTextBox);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
  var cell3 = row.insertCell(2);
  var cell4 = row.insertCell(3);
  cell1.id="myRow";
  cell2.id="myRow";
  cell3.id="myRow";
  cell4.id="myRow";
    cell1.innerHTML = intTextBox;
    cell2.innerHTML = "<input type='text' id='" + intTextBox + "' name='description-" + intTextBox + "'/>";
  cell3.innerHTML = "<input type='number' id='" + intTextBox + "' name='quantity-" + intTextBox + "'/>";
  cell4.innerHTML = "<select name='work_type-"+ intTextBox +"' id='work_type"+ intTextBox +"'><option value='carpenter'>carpenter</option><option value='painter'>painter</option><option value='civil'>civil</option><option value='tiles'>tiles</option></select>";

/*  newTBDiv.innerHTML = "<table width='200' border='1'><tr><th scope='col'>Sno</th><th scope='col'>Description</th><th scope='col'>Quality</th><th scope='col'>Type</th></tr><tr><td>"+intTextBox+"</td><td><input type='text' id='" + intTextBox + "' name='description-" + intTextBox + "'/></td><td><input type='text' id='" + intTextBox + "' name='quantity-" + intTextBox + "'/></td><td><select name='work_type-"+ intTextBox +"' id='work_type"+ intTextBox +"'><option value='carpenter'>carpenter</option><option value='painter'>painter</option><option value='civil'>civil</option><option value='tiles'>tiles</option></select></td></tr>";*/
/*contentID.appendChild(newTBDiv);
*/
}
//FUNCTION TO REMOVE TEXT BOX ELEMENT
function removeElement()
{
if(intTextBox != 0)
{

document.getElementById("myTable").deleteRow(intTextBox);

intTextBox = intTextBox-1;
}
}
</script>


<script type="text/javascript">
function refresh(){

  var u=document.URL;
  var sl=u.slice(-19);

  if(sl=="&po=click&wo=create")

    window.location="pm_page.php?op=overview&search=click";
}

function validate_form1()
{
  var x=document.getElementById('myTable').rows.length;
for (i=1;i<x;i++)
 {
  
if(document.forms["form4"]["description-"+i].value=="")
{
alert("Please Enter The Description in row "+i);
return false;
}
else if(document.forms["form4"]["quantity-"+i].value=="")
{
alert("Please Enter The Quantity in row "+i);
return false;

}
}

if(confirm("Are you Sure You want to continue?"))
{
  return true;
}
else
{
  return false;
}
}
</script>




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
        margin-right:auto;background: #eee;

}
</style>
<meta charset="UTF-8">

<title>PM page</title>
</head>

<body onload="refresh();">

<div class="container">
<div style="display:table-row">
<div class="menu bar dist-top" style="display:table-cell;width:300px; ">
  <table width="200" class="table tab-border table-hover">
  <tr>
    <td><span class="menu bar" style=" float:left"><span class="menu bar" style=" float:left"><img src="css/image/logo.png" width="300" height="83"></span></span></td>
  </tr>
  <tr>
    <td><div align="center"><a href="pm_page.php?op=overview">Overview</a></div></td>
  </tr>
  <tr>
    <td><div align="center"><a href="pm_page.php?op=approval">Approval</a></div></td>
  </tr>
   <tr>
    <td><div align="center"><a href="pm_page.php?op=ST_Approval">Stage Approval</a></div></td>
  </tr>
   <tr>
    <td><div align="center"><a href="../logout.php">Logout</a></div></td>
  </tr>
</table>
</div>
<div class="top menu" style="display:table-cell;width:auto;">
  <div class="header">
  <table width="700" class="table table-striped tab-border">
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
      <td>Role <span style="margin-left:80px">:   <?php 
      echo @$_SESSION['role'];
      ?></span></td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <p>&nbsp;</p>
  </div>
 
 <?php
 ##################################
if(@$_REQUEST['op']=='overview' || @$_REQUEST['op']=='approval' || @$_REQUEST['stage']='Approval')
{

?> 
  
<div class="search" align="center">
  <form name="form2" method="post" action="pm_page.php?op=<?php echo $_REQUEST['op']; ?>&search=click">
      <table width="700" class="table tab-border">
      <tr>
        <td width="612">Project Name : <input type="text" placeholder="Project Name" name="project_name"></td>
        <td width="612">Status :<label>
              <select name="status" id="status">
                <option value="">Choose The Status</option>
                <option value="Project created">Project created</option>
                <option value="Request for quotation">Request for quotation</option>
                <option value="Create quotation">Create quotation</option>
                <option value="Quotation approval">Quotation approval</option>
                <option value="WO created">WO created</option>
                <option value="PO created">PO created</option>
              </select>
              </label>
          
          </td>
      </tr>
      <tr>
        <td>Project ID <span style="margin-left:30px"> : 
          <input type="text" placeholder="Project ID" name="project_id"></span></td>
        <td><input name="search_submit" type="submit" class="style3 btn btn-primary" value="Search" /></td>
      </tr>
    </table>
	</form>
  </div>
  
  <?php }?>
<div class="search_table" align="center">
<?php
if(@$_REQUEST['op']=='overview')  
{
  ?> 
  <table width="700" class="table tab-border table-hover">
    <tr>
      <td>Project Name </td>
      <td>Project ID </td>
      <td>Date</td>
      <td>Initiated By </td>
    </tr>
     
     <?php 
}
else if(@$_REQUEST['op']=='approval' || @$_REQUEST['stage']=='Approval')
{
 ?>
 <table width="700" class="table tab-border table-hover">
    <tr>
      <td>Project Name </td>
      <td>Project ID </td>
      <td>Status</td>
      <td>Date</td>
      <td>Order</td>
    </tr>
 
<?php

}     
#######################     
if(@$_REQUEST['op']=='overview' && @$_REQUEST['search']=='click' && @$_REQUEST['po']=='click')
{
  include 'Project_table_click.php';
}
else if(@$_REQUEST['op']=='overview' && @$_REQUEST['search']=='click')
{
     include 'Project_table.php';
}
if(@$_REQUEST['op']=='approval' && @$_REQUEST['search']=='click')
{
  include 'approval_table.php';
}
if(@$_REQUEST['op']=='approval' && @$_REQUEST['search']=='click' && @$_REQUEST['po']=='click')
{
     include 'approval_click.php';
}
if(@$_REQUEST['op']=='ST_Approval' && @$_REQUEST['search']=='click' && @$_REQUEST['po']=='click')
 {
    include 'stage_click.php';  
 }
 elseif (@$_REQUEST['op']=='ST_Approval' && @$_REQUEST['search']=='click') 
 {
    include 'stage_table.php';    
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
  include 'Project_order.php';
?>

 <table width="700" class="table tab-border table-hover">

 </table>
  
  <center>

  <form name="form4" method="post" action="pm_page.php?op=<?php echo $_REQUEST['op']; ?>&search=click&pn=<?php echo $_SESSION['project_name']?>&po=click&wo=create" onSubmit="return validate_form1()">
    <p><label> Type :
              <select name="typetb" id="type">
                <option value="Workorder">Work order</option>
                <option value="Purchaseorder">Purchase order</option>
              </select>
              </label>
    </p>
    <p>&nbsp;</p>
	        <div id="catList">
<p><input type="button" value="Add" onclick="addElement();" id="add" name="add"><input type="button" value="Remove" onclick="removeElement();"></p>
<table width="700" class="table tab-border " id="myTable">
  <tr>
    <td>Sno</td>
    <td>Description</td>
    <td>Quantity</td>
    <td>Type</td>
  </tr>
          
</table>
<br>
<input type="submit" name="submit" value="Submit" id="submit" class="btn btn-primary" style="display:none;"/>

</div>
    
  </form>
</center>
<?php
  @include 'insertion.php';

}
################################################################ OVERVIEW OVER ################################################################################

################################################################ Funds Approval  ################################################################################
     
      ################################# Quote ########################################

if(@$_REQUEST['op']=='approval' && @$_REQUEST['search']=='click' && @$_REQUEST['po']=='click' && @$_REQUEST['st']=='quote')
{
include 'quote_select.php';
}

        ################################# Quote Over ########################################
  
        ################################# Wo/Po  ########################################
  
if(@$_REQUEST['op']=='approval' && @$_REQUEST['search']=='click' && @$_REQUEST['po']=='click' && @$_REQUEST['st']=='wopo')
{
  include 'order_desc.php';
  include 'wopo.php';
}

        ################################# Wo/Po OVER ########################################


################################################################ Approval OVER  ################################################################################

?>
<?php

################################################################ Stage Approval  ################################################################################
if(@$_REQUEST['op']=='ST_Approval' && @$_REQUEST['search']=='click' && @$_REQUEST['po']=='click' && @$_REQUEST['st_click']!='click')
{
  include 'stg_status.php';
}
if(@$_REQUEST['op']=='ST_Approval' && @$_REQUEST['search']=='click' && @$_REQUEST['po']=='click' && @$_REQUEST['st_click']=='click')
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

?><br>
<br>

<p>&nbsp;</p>
</center> 
<br>
<br>
<table class="table table-hover tab-border"  width="500">
  
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
<form name='form5' method="post" action="ap_st_com.php?op=<?php echo $_REQUEST['op']; ?>&search=click&pn=<?php echo $_SESSION['project_name']; ?>&or=<?php echo $_SESSION['order'];?>&com=comment&st=<?php echo $_SESSION['stg_id'];?>&st_click=click" onsubmit='return val3()'>
     <p>
      <textarea name="St_comment" cols="50" rows="4" maxlength="200" placeholder="Comment Here"></textarea>
    </p>
    
    <input type="submit" value="Approval" class="btn btn-primary" name="Approval"> 
    <input type="submit" value="Reject" class="btn btn-primary" name="Reject">

</form>  
<?php
}
################################################################ Stage Approval OVER ################################################################################

?>
</div>
</div>
</div></div>
<?php include '../include/footer.php'; ?>
</body>
<script>
function val3()
{
  if(document.form5.St_comment.value=='')
  {
    alert('Please enter the comment...');
    return false;
  }
  else
  {
    return true;
  }
}
$(document).ready(function(){
$('#add').click(function(){
  $("#submit").show();
});
});
</script>
</html>
