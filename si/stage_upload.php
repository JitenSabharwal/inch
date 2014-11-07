

<?php
include 'connection.php';
$c=mysqli_query($con,"SELECT * from stg_stage");
?>
<br>
<div align="center">
<table border="1" width="700">
<tr>
<td>Stage ID</td>
<td>WO ID</td>
<td>Upload Files</td>

</tr>
<?php
$x=1;
while ($row=mysqli_fetch_array($c)) {
	if (strcmp($row['st_woid'],@$_REQUEST['or'])==0) {
		
		?>
	<tr>
	<td><?php echo $row['st_stid']; ?></td>
	<td><?php echo $row['st_woid']; ?></td>
	 <td><button  type="button" onclick="disp_form(this.id);" id="b<?php echo $x; ?>">Upload</button></td>
	</tr>
<?php 
}
$x++;
} ?>
</table>

</div>

	
	<div class="upload_box" style="display:none;" id="frm">
<form  id="fileUpload" action="javascript:void(0);" enctype="multipart/form-data" onsubmit="return confirm1();">
<div class="file_browser" ><input type="file" name="multiple_files" id="_multiple_files" class="hide_broswe"  multiple/></div>
<div class="file_upload"><input type="submit" value="Upload" class="upload_button"  id="upload" /> </div>
</form>
</div>	


<script type="text/javascript">

function confirm1()
{

if(confirm("Are You sure,You want to submit"))	
{
	return true;

}

else
	return false;
}
function disp_form(x)
{
	
	$('#frm').fadeIn("500",function(){
		document.getElementById('fileUpload').reset();
		$('.file_boxes').html('');
	//	$('#fileUpload').reset();
	});
	//var last_char=x.slice(-1);
	sessionStorage.prop=x;
		//alert(last_char);

}
</script>