<table border=1 width=500>
	<tr>
		<th>Stage Id</th>
		<th>Project Name</th>	
		<th>Work Order</th>
		
	</tr>
<?php
		function display_st()
		{
?>
			<tr>
					<td><a href="md_page.php?op=<?php echo $_REQUEST['op']; ?>&search=click&pn=<?php echo $_REQUEST['pn']; ?>&or=<?php echo $_REQUEST['or'];?>&po=click&st=<?php echo $_SESSION['stg_id'];?>&st_click=click"><?php echo $_SESSION['stg_id'];?></a></td>
					<td><?php echo $_REQUEST['pn'];?></td>
					<td><?php echo $_SESSION['woid'];?></td>
			</tr>
<?php
		}
##########################################################################################################
$result=mysqli_query($con,"SELECT * from stg_status");
###########################################################################################################
		
		while($row=mysqli_fetch_array($result)) 
		{
			if($row['st_woid']==$_REQUEST['or'])
			{
				if($row['st_stageid']==$_REQUEST['st'])
				{
					$_SESSION['stg_id']=$row['st_stageid'];
					$_SESSION['woid']=$row['st_woid'];
					display_st();				
				}
			}	
		}
?>
</table>
<br>
<p>
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
</p>