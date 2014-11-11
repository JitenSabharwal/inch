<?php
						$fname=$_REQUEST['fname'];
						$mname=$_REQUEST['mname'];
						$lname=$_REQUEST['lname'];
						$tou=$_REQUEST['type_of_user'];					
						$user=$_REQUEST['us_name'];
						$pwd=$_REQUEST['pwd'];
						$ph1=$_REQUEST['ph1'];
						$ph2=$_REQUEST['ph2'];
						$email=$_REQUEST['email1'];
						$alter_email=$_REQUEST['email2'];
						$fax1=$_REQUEST['fax1'];
						$fax2=$_REQUEST['fax2'];
						$addr_line1=$_REQUEST['addr1'];
						$addr_line2=$_REQUEST['addr2'];
						$city=$_REQUEST['city'];
						$state=$_REQUEST['state'];
						$country=$_REQUEST['country'];

						include 'connection.php';

	$sql_query="INSERT INTO usx_user(us_usid,us_fname,us_mname,us_lname,us_phone1,us_phone2,us_email1,us_email2,us_fax1,us_fax2,us_addr1,us_addr2,us_city,us_state,us_country) VALUES('$user','$fname','$mname','$lname','$ph1','$ph2','$email','$alter_email','$fax1','$fax2','$addr_line1','$addr_line2','$city','$state','$country')";
	$insert=mysqli_query($con,$sql_query);
	if(empty($insert))
	{
		echo "error";
	} 
	else
	{
		echo "done";
	}
			
?>