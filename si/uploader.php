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
	
	if(move_uploaded_file(strip_tags($_FILES['upload_file']['tmp_name']), $file_location))
	{
		include 'connection.php';
		$st=$_REQUEST['st'];
		echo $st."error";
		mysqli_query($con,"UPDATE orders set or_status='Site Survey' where or_prjname='$pid'");
		$in=mysqli_query($con,"UPDATE stg_status set st_status='PI' where st_stid=$st");
		if(empty($in))
		{
			echo "error";
		}
		echo $file_id;
	}else{
		echo 'system_error';
	}
	
	
}
?>