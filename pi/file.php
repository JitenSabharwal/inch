<?php

 $pid=$_REQUEST['pn']. '/' . $_REQUEST['or'];


            $path="../ps/upload/uploads/$pid";
           //  echo "<script>alert('$path')</script>";
            $file_display = array('jpg','jpeg','gif','png','pdf','doc','docx','txt','rtf');
            if(is_dir($path))
            {
            $files_count= count(glob($path.'/'.'*'));
         //   echo "<script>alert('lol')</script>";
            //echo $path."working" ;
            ?>
<center>
<div id="container" style="height:20px">

<ul style="margin-left:300px">
          <?php
            if($dir_list=@opendir($path))
            {
              while (($filename = readdir($dir_list)) !== false) {
                
              $ex=explode('.', $filename);
             @include '../file_search.php';
              if(@$valid==1)
              {

              if(in_array($ex[1], $file_display)==true)
              {

            echo  "<li><a href='$path/$filename'>$filename</a></li>";
            $arr = explode(".", $filename, 2);  
                    $_SESSION['filename'] = $arr[0];
                    
              }
            }
          }   
          }
       
            
            ?>
      </ul>
      <span class="button prevButton" style="margin-right:200px"></span>
      <span class="button nextButton"></span></div>
      <?php
}
?>