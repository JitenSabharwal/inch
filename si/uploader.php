<?php




if(isset($_POST) && $_SERVER['REQUEST_METHOD'] == "POST")
{
	$file_name		= strip_tags($_FILES['upload_file']['name']);
	$temp=explode(".", $file_name);
	$file_id 		= strip_tags($_POST['upload_file_ids']);
	$file_size 		= $_FILES['upload_file']['size'];
	$files_path		= 'uploaded_files/';
	$pid=$_REQUEST['project'];

	
	if(!is_dir($files_path.$pid))
		mkdir($files_path.$pid,0777,true);

	$num_files = count(glob("uploaded_files/$pid/*"))+1;

	$file_location 	= $files_path.$pid."/".$num_files.".".$temp[1];
	
	if(move_uploaded_file(strip_tags($_FILES['upload_file']['tmp_name']), $file_location)){
		include 'connection.php';
		mysqli_query($con,"update orders set or_status='Site Survey(Pi)' where or_prjname='$pid'");
		echo $file_id;
	}else{
		echo 'system_error';
	}
	
	
}
?>