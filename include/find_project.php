
<?php

//include '../include/connection.php';

$p=$_REQUEST['pn'];
//echo "<script>alert('$p')</script>";

$pr_id=mysqli_query($con,"SELECT pr_prid from prj_project where pr_prname='$p'");


$getpr_id=mysqli_fetch_array($pr_id);
$q=$getpr_id['pr_prid'];

$path_name=mysqli_query($con,"SELECT fi_path from fid_file where fi_prid='$q'");



?>

<div id="container">

<ul>
          <?php
           			while($row=mysqli_fetch_array($path_name))
           			{
           				$get_path=$row['fi_path'];
            echo  "<li><img src='../si/$get_path' width='604' height='453'/></li>";
              }   
            
            ?>
      </ul>
      <span class="button prevButton"></span>
      <span class="button nextButton"></span>
  </div>