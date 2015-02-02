<?php
include 'connection.php';
session_start();
if(!isset($_SESSION['Employee']) || $_COOKIE['user_role']!="md")
{
  header("location:../logout.php");
}
?>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../css/style.css">

<script type="text/javascript">
//alert(document.URL);
function validate_form1()
{
if(document.forms["form1"]["project_name"].value=="")
{
alert("Please Enter The Project Name");
return false;
}
else if(document.forms["form1"]["pm_list"].value=="Select")
{
alert("please Select The PM");
return false;
}
else if(document.forms["form1"]["pi_list"].value=="Select")
{
alert("please Select The PI");
return false;
}
else if(document.forms["form1"]["ps_list"].value=="Select")
{
alert("please Select The PS");
return false;
}
else if(document.forms["form1"]["fs_list"].value=="Select")
{
alert("please Select The FS");
return false;
}
else if(document.forms["form1"]["si_list"].value=="Select")
{
alert("please Select The SI");
return false;
}
return true;
}


function refresh(){

  var u=document.URL;
  var sl=u.slice(-24);

  if(sl=="op=new_project&new=click")

    window.location="md_page.php?op=new_project";
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
<?php 
//session_start();





if($_REQUEST['op']=='new_project' && @$_REQUEST['new']=='click')
{


 $p_name=$_REQUEST['project_name'];
 $pm=$_REQUEST['pm_list'];
 $pi=$_REQUEST['pi_list'];
 $ps=$_REQUEST['ps_list'];
 $fs=$_REQUEST['fs_list'];
 $si=$_REQUEST['si_list'];
 //$id=md5($id_no);
 $md=$_SESSION['Employee'];
 $cl_name=$_REQUEST['client_name'];


echo "<script>alert('The Project Id is $id_no')</script>";

  $sql=mysqli_query($con,"INSERT INTO prj_project(pr_prid,pr_prname,pr_odate,pr_md,pr_pm,pr_pi,pr_ps,pr_fs,pr_si,client_name) VALUES('$id_no','$p_name',CURDATE(),'$md','$pm','$pi','$ps','$fs','$si','$cl_name')");
  if(empty($sql))
  {
    echo "error";
  }
  else
  {
      $com="Project is created and people involved are ".$md."  ".$pm." ".$pi." ".$ps." ".$fs." ".$si." ".$cl_name;
      $msg = wordwrap($com,70);
      $head='From:noreply@auricktech.com';
// send email
      mail("garvit1608@gmail.com","MD Project Created",$msg,$head);

  }
  mysqli_close($con);
}


 ?>

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
        background: #eee;
}
</style>
<meta charset="UTF-8">

<title>md page</title>
</head>

<body onload="refresh();">

<div style="" class="container">
<div style="">
<div class="menu bar dist-top" style="display:table-cell;width:300px; ">
  <table width="200" class="table table-hover tab-border">
  <tr>
    <td><span class="menu bar" style=" float:left"><span class="menu bar" style=" float:left"><img src="css/image/logo.png" width="300" height="83"></span></span></td>
  </tr>
  <tr>
    <td><div align="center"><a href="md_page.php?op=overview">Overview</a></div></td>
  </tr>
    <tr>
    <td><div align="center"><a href="md_page.php?op=new_project">Create New Project</a></div></td>
  </tr>
  <tr>
    <td><div align="center"><a href="md_page.php?op=approval">Approval</a></div></td>
  </tr>
    <tr>
    <td><div align="center"><a href="../logout.php">Logout</a></div></td>
  </tr>
</table>
</div>
<div class="top menu" style="display:table-cell;width:auto;">
  <div class="header">
  <table width="700" class="table tab-border table-striped ">
    <tr>
      <td width="342">Employee Name : <?php echo $_SESSION['Employee']; ?></td>
      <td width="342" id="demo"> 
<script>
var d = new Date();
document.getElementById("demo").innerHTML = "Date : " + d.toDateString();
</script>
 </td>
    </tr>
    <tr>
      <td>Role  <span style="margin-left:85px;">:<?php echo $_SESSION['role']; ?></span> </td>
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
  <form name="form2" method="post" action="md_page.php?op=<?php echo $_REQUEST['op']; ?>&search=click">
      <table width="700" class="table tab-border" >
      <tr>
        <td width="500">Project Name : <input type="text" placeholder="Project Name" name="project_name"></td>
        <td >              
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
  

<div class="search_table" align="center">

  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="700" class="table table-hover tab-border" >
    
    <?php
    }

?>
<?php 

if($_REQUEST['op']=='overview' && @$_REQUEST['search']=='click' && @$_REQUEST['po']=='click')
{
        include 'Project_table_click.php'; 
}
else if($_REQUEST['op']=='overview' && @$_REQUEST['search']=='click')
{
        include 'Project_table.php';
}
 else if($_REQUEST['op']=='approval' && @$_REQUEST['search']=='click')  
 {
      include 'approval_table.php';
 }
if(@$_REQUEST['op']=='approval' && @$_REQUEST['search']=='click' && @$_REQUEST['po']=='click')
 {
  
      include 'approval_click.php';
 }
 ?>
  </table>
  
  
<?php 

############################################################### OVERVIEW CLICK ######################################################################

  if($_REQUEST['op']=='overview' && @$_REQUEST['search']=='click' && @$_REQUEST['po']=='click')
{
  include 'Project_order.php';
?>
        <?php include 'know_status.php'; ?>  
          </div>  

                <?php
}

?>
<br>



<?php

  
############################################################### OVERVIEW CLICK OVER ######################################################################
    
############################################################### NEW PROJECT CLICK ######################################################################
     
	
	if($_REQUEST['op']=='new_project')
	{
    
  @$result=mysqli_query($con,"SELECT * from usx_user");
	?>
<div class="new_project" align="center">
<form name="form1" method="post" action="md_page.php?op=<?php echo $_REQUEST['op']; ?>&new=click" onSubmit="return validate_form1()">

    <table width="700"  class="tab-border table table-striped">
    <tr>
      <td>Project Name </td>
      <td><input type="text" placeholder="Project Name" name="project_name"></td>
    </tr>
    <tr>
      <td>Asign PM to this project</td>
      <td><select name="pm_list" id="pm_list">
                <option value="Select">Select</option>
                <?php
                
              //   echo "<script>alert('hello');</script>";
                  while($row=mysqli_fetch_array($result))
                  {
                    $x=$row['us_pm'];
                      if(strcasecmp($x, "Yes")==0)
                    echo "<option >".$row['us_fname']." ".$row['us_lname']."</option>";
                   
                  }


                 ?>
              </select></td>
    </tr>
      <tr>
      <td>Asign PI to this project</td>
      <td><select name="pi_list" id="pi_list">
                <option value="Select">Select</option>
               <?php
               mysqli_data_seek($result,0);
                  while($row=mysqli_fetch_array($result))
                  {
                   $x=$row['us_pi'];

                    if(strcasecmp($x, "Yes")==0)
                    echo "<option>".$row['us_fname']." ".$row['us_lname']."</option>";
                  }


                 ?>
              </select></td>
    </tr>
      <tr>
      <td>Asign PS to this project</td>
      <td><select name="ps_list" id="ps_list">
                <option value="Select">Select</option>
               <?php
            //   pos_reset();
                mysqli_data_seek($result,0);
                  while($row=mysqli_fetch_array($result))
                  {
                   $x=$row['us_ps'];
                     if(strcasecmp($x, "Yes")==0)
                    echo "<option>".$row['us_fname']." ".$row['us_lname']."</option>";
                  }


                 ?>
              </select></td>
    </tr>
      <tr>
      <td>Asign FS to this project</td>
      <td><select name="fs_list" id="fs_list">
                <option value="Select">Select</option>
               <?php
             //  pos_reset();
                mysqli_data_seek($result,0);
                  while($row=mysqli_fetch_array($result))
                  {
                    $x=$row['us_fs'];
                      if(strcasecmp($x, "Yes")==0)
                    echo "<option >".$row['us_fname']." ".$row['us_lname']."</option>";
                  }


                 ?>
              </select></td>
    </tr>
      <tr>
      <td>Asign SI to this project</td>
      <td><select name="si_list" id="si_list">
                <option value="Select">Select</option>
                <?php
               //     pos_reset();
                mysqli_data_seek($result,0);
                  while($row=mysqli_fetch_array($result))
                  {
                  $x=$row['us_si'];
                      if(strcasecmp($x, "Yes")==0)
                    echo "<option >".$row['us_fname']." ".$row['us_lname']."</option>";
                  }


                 ?>
              </select></td>

    </tr>
    <tr>
      <td>Client Name</td>
               <td><input type="text" placeholder="Client Name" name="client_name"></td>

    </tr> 
  </table>
  <input name="submit" type="submit" class="style3 btn btn-primary" value="Submit" />
  </form>
	</div>
	<?php
	}
	?>
  <p>&nbsp;</p>
 


<?php  
############################################################### NEW PROJECT CLICK OVER######################################################################

################################################################### APPROVAL CLICK ######################################################################

if($_REQUEST['op']=='approval' && @$_REQUEST['search']=='click' && @$_REQUEST['po']=='click')
 {
  ############################################## FUNDS ######################################################
    
    if(@$_REQUEST['status']=='funds')
      {
        include 'order_table.php';
        include 'quote_table.php';
        $w=substr($_REQUEST['or'],0,1);
        if($w=='W')
             { 
                 include 'stage_table.php';
             }
        include 'f_comment.php';     
?>
            <form name="form3" method="post" action="Fund.php?op=<?php echo $_REQUEST['op']; ?>&search=click&pn=<?php echo $_SESSION['project_name']?>&or=<?php echo $_REQUEST['or']?>" onsubmit="return valf();">
            
                <textarea rows="4" cols="50" name="MD_comment" placeholder="Comment here">
                
                </textarea><br>
                
                <input name="approval" type="submit"   class="style3 btn btn-primary" value="Approval" />
                
                <input name="reject" type="submit"   class="style3 btn btn-primary" value="Reject" />
            
            </form>
<?php

            
     }

      ############################################## FUNDS OVER ######################################################

      ############################################## STAGES ######################################################

            if(@$_REQUEST['status']=='stage')
            {
?>

<?php
            
            if(@$_REQUEST['op']=='approval' && @$_REQUEST['search']=='click' && @$_REQUEST['po']=='click' && @$_REQUEST['st_click']!='click')
            {
              include 'stg_status.php';
            }
            if(@$_REQUEST['op']=='approval' && @$_REQUEST['search']=='click' && @$_REQUEST['po']=='click' && @$_REQUEST['st_click']=='click')
            {
                 include 'stg_status_click.php';      
 ?>

                <table class="table table-hover tab-border"  width='700'>
                  
                  <tr>
                    <td>
                      S.No.
                    </td>
                    <td>
                      Name
                    </td>
                    <td>
                        Authority
                    </td>
                    <td>
                      Comment
                    </td>

                  </tr>
                  <?php include 'st_comment.php'; ?>
                </table>
                <br>
                <br>


              <form name="form4" method="post" action="ap_st_com.php?op=<?php echo $_REQUEST['op']; ?>&search=click&pn=<?php echo $_SESSION['project_name']?>&or=<?php echo $_REQUEST['or']?>&st=<?php echo $_REQUEST['st'];?>&st_click=click" onsubmit="return val1();">
                  
                  <textarea rows="4" cols="50" name="St_comment" placeholder="Comment here">
                  </textarea>

                  <br>
                  
                  <input name="approval" type="submit"  class="style3 btn btn-primary" value="Approval" />
                
                  <input name="reject" type="submit"  class="style3 btn btn-primary" value="Reject" />
            
              </form>
<?php

    }
  }

############################################## STAGES OVER ######################################################

}

############################################################### APPROVAL CLICK OVER ######################################################################

?>

</div>
</div>
</div>

      <?php include '../include/footer.php'; ?>
</body>
<script type="text/javascript">
function valf() 
{
   
 if(document.form3.MD_comment.value=='')
  {
    alert('Please enter the comment');
    return false;
  }
else
    return true;
  
}
function val1() 
{
  // body...
//  alert('vvv');
  if(document.form4.St_comment.value=='')
  {
    alert('Please enter the comment');
    return false;
  }
else
  return true;

}

</script>
</html>
