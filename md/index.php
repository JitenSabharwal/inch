<?php
session_start();
$pid=$_REQUEST['pid'];

if($pid=='click')
  {
include('connection.php');

$username=$_POST['user'];

$password=$_POST['pass'];

$b="select * from usernpass where username='$username' and password='$password'";

$c=mysql_query($b); 

$d=mysql_num_rows($c);

if($d==1){
$_SESSION['user']=$username;
$select_query="select * from usernpass where username='$username'";

$mysql_query=mysql_query($select_query); 

$fetch=mysql_fetch_array($mysql_query);
$role=$fetch['role'];
/*echo "<script type='text/javascript'>alert('$role');</script>";
*/
if($role=='md')
{
header ("location:md_page.php?op=overview");

}
elseif($role=='pm')
{
header ("location:pm_page.php?op=overview");

}
elseif($role=='pi')
{
header ("location:application.php?role=$role");

}
elseif($role=='ps')
{
header ("location:application.php?role=$role");

}
elseif($role=='fs')
{
header ("location:application.php?role=$role");

}
else
{
header ("location:application.php?role=$role");

}
}
else

header ("location:index.php?pid=err");
  }

?>
<?php /*?><?php
mkdir("testing");
?> <?php */?>

<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Login Form</title>
 <link rel="stylesheet" type="text/css" href="css/mystyle.css">


<!-- 
    <script src="js/prefixfree.min.js"></script>
 -->

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
		<form id="form1" name="form1" method="post" action="index.php?pid=click">
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
		<div><a href="index.php?set=change">change P<span>assword?</span></a></div>
</div>

<div class="error">

<?php
if($pid=='err')
echo "<div>incorrect<span> username and password</span></div>";

?>
</div>

<!-- 
  <script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>
 -->

</body>

</html>