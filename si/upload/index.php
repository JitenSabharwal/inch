<?php
/**
* Multi file upload example
* @author Resalat Haque
* @link http://www.w3bees.com/2013/02/multiple-file-upload-with-php.html
**/
$id=$_SESSION['st_upload']; 
$ido=$_SESSION['or_upload'];
        			
$valid_formats = array("jpg", "png", "gif", "zip", "bmp");
$max_file_size = 1024*100000; //100 kb
//$path = "uploads/"; // Upload directory
$targetFolder = 'upload/uploads/'; // Relative to the root
				if(!is_dir($targetFolder.$_SESSION['pr_upload']))
					mkdir($targetFolder.$_SESSION['pr_upload'],0777,true);
				if(!is_dir($targetFolder. '/'.$_SESSION['pr_upload']. '/' .$_SESSION['or_upload']))
					mkdir($targetFolder. '/'.$_SESSION['pr_upload']. '/' .$_SESSION['or_upload'],0777,true);
				if(!is_dir($targetFolder.'/'.$_SESSION['pr_upload']. '/' .$_SESSION['or_upload']. '/' .$_SESSION['st_upload']))
					mkdir($targetFolder.'/'.$_SESSION['pr_upload']. '/' .$_SESSION['or_upload']. '/' .$_SESSION['st_upload'],0777,true);

$path =  $targetFolder.$_SESSION['pr_upload']. '/' . $_SESSION['or_upload']. '/' . $_SESSION['st_upload'];
 
 $x=count(glob($path.'/'.'*'));
//  echo "<script>alert('$x')</script>";

		if(count(glob($path.'/'.'*'))<5)
		{
			
$count = 0;

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
	// Loop $_FILES to execute all files
	foreach ($_FILES['files']['name'] as $f => $name) { 
	 include 'idgen.php';  
	   echo "<script>alert('$id_no')</script>";
	    if ($_FILES['files']['error'][$f] == 4) {
	        continue; // Skip file if any error found
	    }	       
	    if ($_FILES['files']['error'][$f] == 0) {	           
	        if ($_FILES['files']['size'][$f] > $max_file_size) {
	            $message[] = "$name is too large!.";
	            continue; // Skip large files
	        }
			elseif( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){
				$message[] = "$name is not a valid format";
				continue; // Skip invalid file formats
			}

	        else{ // No error found! Move uploaded files 
	        	$temp=explode('.',$name);
	            if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.'/'.$_SESSION['fi_fiid'].'.'.$temp[1])) {
	            	 // Number of successfully uploaded files	
	            	$count++;
	            	$_SESSION['path']=$path.'/'.$_SESSION['fi_fiid'].'.'.$temp[1];
	            	include 'filedetails.php';
	            	//echo "Working";
                 }
	        }
	    }
	}
}
}
	else
		$message[]="Only 5 files can be uploaded for this stage";
if(empty($updfile))
	{

	}
	else
	{
					$inserto=mysqli_query($con,"UPDATE orders SET or_status='Site Survey' where or_wopo_cid='$ido'");
	            	$inserts=mysqli_query($con,"UPDATE stg_status SET st_status='PI' ,st_count='$count' where st_stageid='$id'");

	}
?>


<style type="text/css">
a{ text-decoration: none; color: #333}
h1{ font-size: 1.9em; margin: 10px 0}
p{ margin: 8px 0}
*{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	-webkit-font-smoothing: antialiased;
	-moz-font-smoothing: antialiased;
	-o-font-smoothing: antialiased;
	font-smoothing: antialiased;
	text-rendering: optimizeLegibility;
}
body{
	font: 12px Arial,Tahoma,Helvetica,FreeSans,sans-serif;
	text-transform: inherit;
	color: #333;
	background: #e7edee;
	width: 100%;
	line-height: 18px;
}
.wrap{
	width: 500px;
	margin: 15px auto;
	padding: 20px 25px;
	background: white;
	border: 2px solid #DBDBDB;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	overflow: hidden;
	text-align: center;
}
.status{
	/*display: none;*/
	padding: 8px 35px 8px 14px;
	margin: 20px 0;
	text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
	color: #468847;
	background-color: #dff0d8;
	border-color: #d6e9c6;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;
}
/*
input[type="submit"] {
	cursor:pointer;
	width:100%;
	border:none;
	background:#991D57;
	background-image:linear-gradient(bottom, #8C1C50 0%, #991D57 52%);
	background-image:-moz-linear-gradient(bottom, #8C1C50 0%, #991D57 52%);
	background-image:-webkit-linear-gradient(bottom, #8C1C50 0%, #991D57 52%);
	color:#FFF;
	font-weight: bold;
	margin: 20px 0;
	padding: 10px;
	border-radius:5px;
}
input[type="submit"]:hover {
	background-image:linear-gradient(bottom, #9C215A 0%, #A82767 52%);
	background-image:-moz-linear-gradient(bottom, #9C215A 0%, #A82767 52%);
	background-image:-webkit-linear-gradient(bottom, #9C215A 0%, #A82767 52%);
	-webkit-transition:background 0.3s ease-in-out;
	-moz-transition:background 0.3s ease-in-out;
	transition:background-color 0.3s ease-in-out;
}
input[type="submit"]:active {
	box-shadow:inset 0 1px 3px rgba(0,0,0,0.5);
}
*/
</style>


<body>
	<div class="wrap">
		<h1>Upload files</h1>
		<?php
		# error messages
		if (isset($message)) {
			foreach ($message as $msg) {
				printf("<p class='status'>%s</p></ br>\n", $msg);
			}
		}
		# success message
		if(@$count !=0){
			if(empty($updfile))
			{
					printf("<p class='status'>%d files Addition was unsuccessfully!</p>\n", $count);

			}
			else
			printf("<p class='status'>%d files added successfully!</p>\n", $count);
		
		?>
		<form action="si_page.php?op=overview&search=click" method="post" enctype="multipart/form-data">
			<input type="submit" class="btn btn-primary" value="Finish">
		</form>
		<?php
			}
			else
			{
		?>
			<p>Max file size 10Mb, Valid formats jpg, png, gif</p>
			<br />
			<br />
			<!-- Multiple file upload html form-->
			<form action="" method="post" enctype="multipart/form-data">
				<input type="file" name="files[]" multiple="multiple" accept="image/*" >
				<input type="submit" class="btn btn-primary" value="Upload">
			</form>
		<?php
			}
		?>
</div>
</body>
