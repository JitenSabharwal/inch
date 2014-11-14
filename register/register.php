<?php
						$fname=$_REQUEST['fname'];
						$mname=$_REQUEST['mname'];
						$lname=$_REQUEST['lname'];
						$tou=$_REQUEST['type_of_user'];					
						$user=$_REQUEST['us_name'];
						$pwd=md5($_REQUEST['pwd']);
					//	$us_password=md5($pwd);
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
						$sql_query=null;
						if(strcasecmp($tou,"managing director")==0)
{
				$sql_query="INSERT INTO usx_user(us_usid,us_password,us_fname,us_mname,us_lname,us_phone1,us_phone2,us_email1,us_email2,us_fax1,us_fax2,us_addr1,us_addr2,us_city,us_state,us_country,us_md) VALUES('$user','$pwd','$fname','$mname','$lname','$ph1','$ph2','$email','$alter_email','$fax1','$fax2','$addr_line1','$addr_line2','$city','$state','$country','yes')";
	
}
else if(strcasecmp($tou,"project manager")==0)
{
				$sql_query="INSERT INTO usx_user(us_usid,us_password,us_fname,us_mname,us_lname,us_phone1,us_phone2,us_email1,us_email2,us_fax1,us_fax2,us_addr1,us_addr2,us_city,us_state,us_country,us_pm) VALUES('$user','$pwd','$fname','$mname','$lname','$ph1','$ph2','$email','$alter_email','$fax1','$fax2','$addr_line1','$addr_line2','$city','$state','$country','yes')";
	
}
else if(strcasecmp($tou,"project in charge")==0)
{
				$sql_query="INSERT INTO usx_user(us_usid,us_password,us_fname,us_mname,us_lname,us_phone1,us_phone2,us_email1,us_email2,us_fax1,us_fax2,us_addr1,us_addr2,us_city,us_state,us_country,us_pi) VALUES('$user','$pwd','$fname','$mname','$lname','$ph1','$ph2','$email','$alter_email','$fax1','$fax2','$addr_line1','$addr_line2','$city','$state','$country','yes')";
	
}
else if(strcasecmp($tou,"site engineer")==0)
{
				$sql_query="INSERT INTO usx_user(us_usid,us_password,us_fname,us_mname,us_lname,us_phone1,us_phone2,us_email1,us_email2,us_fax1,us_fax2,us_addr1,us_addr2,us_city,us_state,us_country,us_si) VALUES('$user','$pwd','$fname','$mname','$lname','$ph1','$ph2','$email','$alter_email','$fax1','$fax2','$addr_line1','$addr_line2','$city','$state','$country','yes')";
	
}
else if(strcasecmp($tou,"finance specialist")==0)
{
				$sql_query="INSERT INTO usx_user(us_usid,us_password,us_fname,us_mname,us_lname,us_phone1,us_phone2,us_email1,us_email2,us_fax1,us_fax2,us_addr1,us_addr2,us_city,us_state,us_country,us_fs) VALUES('$user','$pwd','$fname','$mname','$lname','$ph1','$ph2','$email','$alter_email','$fax1','$fax2','$addr_line1','$addr_line2','$city','$state','$country','yes')";
	
}
else if(strcasecmp($tou,"purchase specialist")==0)
{
				$sql_query="INSERT INTO usx_user(us_usid,us_password,us_fname,us_mname,us_lname,us_phone1,us_phone2,us_email1,us_email2,us_fax1,us_fax2,us_addr1,us_addr2,us_city,us_state,us_country,us_ps) VALUES('$user','$pwd','$fname','$mname','$lname','$ph1','$ph2','$email','$alter_email','$fax1','$fax2','$addr_line1','$addr_line2','$city','$state','$country','yes')";
	
}
else if(strcasecmp($tou,"client")==0)
{ 
	$name=$fname.' '.$mname.' '.$lname;
	$sql_query="INSERT INTO cle_client(cl_clid,cl_password,cl_clname,cl_phone1,cl_phone2,cl_email1,cl_email2,cl_fax1,cl_fax2) VALUES('$user','$pwd','$name','$ph1','$ph2','$email','$alter_email','$fax1','$fax2')";
	
}
	$insert=mysqli_query($con,$sql_query);
	if(empty($insert))
	{
		echo "error";
	//	echo $pwd;
	} 
	else
	{
		echo "done";
		if(strcasecmp($tou,"client")==0)
			header("location:../client.php");
		else
		header("location:../index.php");
	}
			
?>