<?php




if(isset($_POST) && $_SERVER['REQUEST_METHOD'] == "POST")
{
	$file_name		= strip_tags($_FILES['upload_file']['name']);
	$temp=explode(".", $file_name);
	$file_id 		= strip_tags($_POST['upload_file_ids']);
	$file_size 		= $_FILES['upload_file']['size'];
	$files_path		= 'uploaded_files/';
	$pid=$_REQUEST['project'];

	$new_pid=str_replace("&"," ", $pid);
	
	$new_pid_again=str_replace("="," ", $new_pid);

	$pids=explode(" ", $new_pid_again);

	$pname=$pids[13];
	$stg_id=$pids[9];
	$wo_id=$pids[5];



	
	if(!is_dir($files_path.$pname))
		{
			mkdir($files_path.$pname,0777,true);
		}
			if(!is_dir($files_path.$pname.'/'.$wo_id))
			{
				mkdir($files_path.$pname.'/'.$wo_id,0777,true);
			

			}		
					if(!is_dir($files_path.$pname.'/'.$wo_id.'/'.$stg_id))
				{
					mkdir($files_path.$pname.'/'.$wo_id.'/'.$stg_id,0777,true);	
				}

		$path=$pname.'/'.$wo_id.'/'.$stg_id;
								

	$num_files = count(glob("uploaded_files/$path/*"))+1;

	$file_location 	= $files_path.$path."/".$num_files.".".$temp[1];
	
	if(move_uploaded_file(strip_tags($_FILES['upload_file']['tmp_name']), $file_location))
	{
		include 'connection.php';
		$st=$stg_id;
		echo $st."error";
		mysqli_query($con,"UPDATE orders set or_status='Site Survey' where or_prjname='$pname'");
		mysqli_query($con,"UPDATE stg_status set st_status='PI' where st_stageid='$st'");
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