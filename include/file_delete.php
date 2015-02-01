 <?php

 // perform actions for each file found
  foreach (glob("../si/upload/uploads/".$prname.'/'.$wo.'/'.$st.'/'.'*') as $filename) {
  //	$_SESSION['filename']='FI-00049';
 //   echo "\n$filename size " . filesize($filename) . "\n";
    $str=substr($filename,-12);
    $temp_str=explode('.',$str);
   // if(strcasecmp($_SESSION['filename'],$temp_str[0])==0)
    {
    	unlink($filename);
    	echo "file deleted";
    }
   // echo "\n$str\n";
  }

  ?>