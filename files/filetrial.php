<!DOCTYPE HTML>
<html>
<body>
<?php
//$txt1="I love programing language.";
$new=date("d-m-Y")."_".date("h-i-s").".txt";
echo $new;
mkdir("tsting");
//echo date("d-m-Y");
echo date("h:i:s");  
?>

<br>
<?php
//$txt2="\nfor my details u can contact me on jitensabharwal@gmail.com";
$myfile=fopen($new,"w")or die("file not created ");
$txt1=1;
while($txt1<10)
{
	

	fwrite($myfile,$txt1);
	if($txt1%2==0)
		fwrite($myfile,"\r\n");
	else
		fwrite($myfile, "\t");
	$txt1=$txt1+1;
}
//fwrite($myfile,$txt2);
fclose($myfile);
?>
</body>
</html>