<table width="700" class="table table-bordered table-hover">
<tr>
<td>Project Name</td>
<td>Order Id</td>
<td>Status</td>
 </tr>

 <?php
################################################################################################
$result=mysqli_query($con,"SELECT * from orders");//the query to get the whole database in one variable        
$value=0;
 ################################################################################################
 function display()
 {
 	?>
 	<tr>
 	<td><?php echo $_SESSION['name']; ?></td>
 	<td><?php echo $_SESSION['id']; ?></td>
 	<td><?php echo $_SESSION['status']; ?></td>
 </tr>
 <?php	
 }
 	while($row=mysqli_fetch_array($result))
 	{
 		if($row['or_prjname']==$_REQUEST['pn'])
 		{
 			$value=1;
 			$_SESSION['name']=$row['or_prjname'];
 			$_SESSION['id']=$row['or_wopo_cid'];
 			$_SESSION['status']=$row['or_status'];
 			display();
 		}
 	}
 if($value==0)
	{
  ?>
  <tr>
      <td colspan="3" align="center" >No &nbsp; Results </td>
  </tr>
  <?php
	}

 ?>

 </table>

<center>
      <?php
  $pid=$_REQUEST['pn']. '/' . $_REQUEST['or']. '/' . $_REQUEST['st'];


            $path="../si/upload/uploads/$pid";
          //  echo "<script>alert('$path')</script>";
            $file_display = array('jpg', 'jpeg', 'png', 'gif');
            if(is_dir($path))
            {
            $files_count= count(glob($path.'/'.'*'));
         //   echo "<script>alert('lol')</script>";
            ?>
<div id="container">

<ul>
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

            echo  "<li><img src='$path/$filename' width='604' height='453'/></li>";
              }
            }
          } 
           $arr = explode(".", $filename, 2);  
                    $_SESSION['filename'] = $arr[0];
                      
          }
       
            
            ?>
      </ul>
      <span class="button prevButton"></span>
      <span class="button nextButton"></span></div>
      <?php
}

?><br>
<br>