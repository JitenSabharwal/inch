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
<div id="container" style="height:20px">
 <table  class="table  table-hover" style="width:300px">
<tr>
  <td>Click To Download :</td>
  <td>
  
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

            echo  "<a href='$path/$filename'>$filename</a>";
            $arr = explode(".", $filename, 2);  
                    $_SESSION['filename'] = $arr[0];
                    
              }
            }
          }   
          }
       
            
            ?>
     
      </div>
</td>
</tr>
</table>
<br>
      <?php

}
?>