<?php
$valid=0;
$file_query=mysqli_query($con,"SELECT fi_fiid from fid_file");

while ($row=mysqli_fetch_array($file_query)) {
	# code...
	if(strcmp($ex[0],$row['fi_fiid'])==0)
	{
		$valid=1;
	}	
}

?>