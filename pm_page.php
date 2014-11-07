    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" ></script>
    <script type="text/javascript">
        //when the webpage has loaded do this
        $(document).ready(function() {  
            //if the value within the dropdown box has changed then run this code            
            $('#num_cat').change(function(){
                //get the number of fields required from the dropdown box
                var num = $('#num_cat').val();                  

                var i = 0; //integer variable for 'for' loop
                var html = '<table width="200" border="1"><tr><th scope="col">Sno</th><th scope="col">Description</th><th scope="col">Quality</th><th scope="col">Type</th></tr>'; //string variable for html code for fields 
                //loop through to add the number of fields specified
                for (i=1;i<=num;i++) {
                    //concatinate number of fields to a variable
					
					html += '<tr><td>' + i + '</td><td><input type="text" name="description-' + i + '"/></td><td><input type="text" name="quantity-' + i + '"/></td><td><select name="work_type-'+ i +'" id="work_type'+ i +'"><option value="carpenter">carpenter</option><option value="painter">painter</option><option value="civil">civil</option><option value="tiles">tiles</option></select></td></tr>';					
                }
					html += '</table><br><input type="submit" name="submit" value="Submit"/>';
                //insert this html code into the div with id catList
                $('#catList').html(html);
            });
        }); 
    </script>


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

<title>PM page</title>
</head>

<body>

<div style="display:table; width:100%;">
<div style="display:table-row">
<div class="menu bar" style="display:table-cell;width:300px; ">
  <table width="200" border="1">
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
    <td><div align="center"><a href="">Logout</a></div></td>
  </tr>
</table>
</div>
<div class="top menu" style="display:table-cell;width:auto;">
  <div class="header" align="center">
  <table width="700" border="1">
    <tr>
      <td width="342">Employee Name : </td>
      <td width="342" id="demo"> 
<script>
var d = new Date();
document.getElementById("demo").innerHTML = "Date : " + d.toDateString();
</script>
 </td>
    </tr>
    <tr>
      <td>Role : </td>
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
  <form name="form2" method="post" action="pm_page.php?op=<?php echo $_REQUEST['op']; ?>&search=click">
      <table width="700" border="1">
      <tr>
        <td width="612">Project Name : <input type="text" placeholder="Project Name" name="project_name"></td>
        <td width="612">Status :<label>
              <select name="status" id="status">
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
  <p>&nbsp;</p>
  <table width="700" border="1">
    <tr>
      <td>Project Name </td>
      <td>Project ID </td>
      <td>Status</td>
      <td>Date</td>
      <td>Initiated By </td>
    </tr>
    <tr>
      <td><a href="pm_page.php?op=<?php echo $_REQUEST['op']; ?>&search=click&pn=project1&po=click">Project1</a></td>
      <td>PJ-000001</td>
      <td>Project created</td>
      <td>06/11/14</td>
      <td>Arjun </td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
<?php   

  if($_REQUEST['op']=='overview' && $_REQUEST['search']=='click' && $_REQUEST['po']=='click')
{
?> 
  <center>
 
<div id="container">
	<ul>
      	<li><img src="images/picture1.jpg" width="604" height="453" /></li>
            <li><img src="images/picture2.jpg" width="604" height="453" /></li>
            <li><img src="images/picture3.jpg" width="604" height="453" /></li>
      </ul>
      <span class="button prevButton"></span>
      <span class="button nextButton"></span></div>



<p>&nbsp;</p>

  <form name="form4" method="post" action="pm_page.php?op=<?php echo $_REQUEST['op']; ?>&search=click&pn=project1&po=click&wo=create" onSubmit="return validate_form1()">
    <p><label> Type :
              <select name="type" id="type">
                <option value="Work order">Work order</option>
                <option value="Purchase order">Purchase order</option>
              </select>
              </label>
    </p>
    <p>&nbsp;</p>
    <p>Number of fields required:      
        <select id="num_cat" name="num_cat">
          <option value="0">- SELECT -</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
          <option value="13">13</option>
          <option value="14">14</option>
          <option value="15">15</option>
        </select>
      </p>
	        <div id="catList">
</div>
    
  </form>
</center>

<?php
}

?>
</div>
</div>
</div></div>
</body>
</html>