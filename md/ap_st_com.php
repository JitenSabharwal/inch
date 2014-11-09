<?php
session_start(st);
include 'connection.php';
?>
<center>
 <?php
 
            $pid=$_REQUEST['pn'];
            $path="../si/uploaded_files/$pid";
            $file_display = array('jpg', 'jpeg', 'png', 'gif');
            if(is_dir($path))
            {
                 $files_count= count(glob("$path./*"));

  ?>
<div id="container">
  <ul>

      <?php
              if($dir_list=@opendir($path))
              {
                    while (($filename = readdir($dir_list)) !== false) {
                    $ex=strtolower(end(explode('.', $filename)));

                    if(in_array($ex, $file_display)==true)
                    {

                  echo  "<li><img src='$path/$filename' width='604' height='453'/></li>";
                    }
                   }
                  }
       
            
            ?>
      </ul>
      <span class="button prevButton"></span>
      <span class="button nextButton"></span></div>
<?php
              }
              else
              {
                echo "<script>alert('No images for this project')</script>";
              }
?>


<p>&nbsp;</p>

  </center>
<br>

<?php
  
  if(@$_REQUEST['approval']=='Approval')
   {
      include 'stage_approval.php';
   }
   elseif(@$_REQUEST['reject']=='Reject')
   {
      include 'stage_reject.php';
   }

session_destroy(st);   

header("location:md_page.php?op=approval&search=click");
?>