<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Login Form</title>
  <!--
 <link rel="stylesheet" type="text/css" href="css/mystyle.css">
-->
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<style type="text/css">

body{background: #eee;font-size: 16px;}

#form1{max-width: 330px;}
.form-control{font-size: 16px;padding: 10px;}
.container{margin-top: 150px;}

</style>

</head>

<body>

  <div class="container">
		
		<div class="header"><img src="css/image/logo.png" height="120" width="400">
		  <!-- 
			<div>Inch<span>Studio</span></div>
 -->
		</div>
		<br>
		<form id="form1" name="form1" method="post" action="validation.php?pid=click" onsubmit="return validate();">
		<div class="login">

				<input type="text" placeholder="Username" name="user" class="form-control" ><br>
				<input type="password" placeholder="Password" name="pass" class="form-control"><br>
<!-- 
				<input type="button" value="Login">
 -->
				<button name="Submit" type="submit" id="login" class="style3 btn btn-lg btn-primary btn-block" value="Login"  />Log In</button>

		</div>
		</form>
		<div class="change">
			<a href="register/"><span>New User?</span></a><br>
	<a href="index.php?set=change">Change <span>Password?</span></a>

</div>

<div class="">
<?php
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

	$url=parse_url($actual_link);
	$pid=array();

	parse_str(@$url['query'],$pid);

if(@$pid['pid']=='err')
echo "<div style='color:red'>incorrect username and password</div>";
?>

	</div>
</div>
<?php include 'include/footer.php'; ?>

</body>
<script type="text/javascript">
function validate () {
	
	

	var user=document.form1.user.value;
	var pwd=document.form1.pass.value;
	if(user=='')
	{	alert('Please enter username'); return false;}
	else if(pwd=='')
	{	alert('Please enter the password'); return false;}

}

</script>
</html>