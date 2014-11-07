<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Login Form</title>
 <link rel="stylesheet" type="text/css" href="css/mystyle.css">

</head>

<body>

  <div class="body"></div>
		<div class="grad"></div>
		<div class="header"><img src="css/image/logo.png" height="120" width="400">
		  <!-- 
			<div>Inch<span>Studio</span></div>
 -->
		</div>
		<br>
		<form id="form1" name="form1" method="post" Action="validation.php?pid=click">
		<div class="login">
				<input type="text" placeholder="username" name="user"><br>
				<input type="password" placeholder="password" name="pass"><br>
<!-- 
				<input type="button" value="Login">
 -->
				<input name="Submit" type="submit" id="login" class="style3" value="Login" />

		</div>
		</form>
		<div class="change">
		<div><a href="index.php?set=change">change <span>Password?</span></a></div>
</div>

<div class="error">
<?php
if(@$pid=='err')
echo "<div>incorrect<span> username and password</span></div>";
?>

</div>

</body>

</html>