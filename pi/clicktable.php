
<?php include 'intialize.php' ?>
<?php
$name = explode(" ", $_SESSION['Employee']);

//#####################################################
$result=mysqli_query($con,"SELECT * from prj_project");//the query to get the whole database in one variable 
$result1=mysqli_query($con,"SELECT * from orders");       
$result2=mysqli_query($con,"SELECT * from pod_order");
$result3=mysqli_query($con,"SELECT * from wok_order");
//######################################################

  function display_project()//function to display the table values 
          {
            ?>          
        <tr>
              <td><a href="pi_page.php?op=<?php echo $_REQUEST['op']; ?>&search=click&pn=<?php echo $_SESSION['project_name'] ?>&or=<?php echo @$_SESSION['order'];?>&po=click&quote=<?php echo $_REQUEST['quote'];?>"> <?php  echo @$_SESSION['project_name'];  ?></a></td>
              <td><?php echo @$_SESSION['project_id'];?></td>
              <td><?php echo @$_SESSION['status']    ;?></td>
              <td><?php
                 
                  $pn=$_REQUEST['pn'];
                  @$result3=mysqli_query(@$con,"SELECT * from prj_project where pr_prname='$pn'");//the query to get the whole database in one variable 
                  
                    while(@$row3=mysqli_fetch_array($result3))
                    {
                        {
                          echo @$row3['pr_odate'];
                        }
      
                    }          
                ?></td>
              <td><?php echo @$_SESSION['order'];?></td>
        </tr>
      <?php
       }

while($row=mysqli_fetch_array($result))
  {
      if(strcmp($row['pr_prname'],@$_REQUEST['pn'])==0)
      {
        //echo @$_REQUEST['pn'];
              $_SESSION['project_name'] =$_REQUEST['pn'];
              $_SESSION['project_id']   =$row['pr_prid'];
              while($row1=mysqli_fetch_array($result1))
              {
                 if($row1['or_wopo_cid']==$_REQUEST['or'])
                 {
                   $_SESSION['status']       =$row1['or_status'];
                 }
              }
              $_SESSION['date']         =$row['pr_adtm'];
              $_SESSION['order']        =$_REQUEST['or'];
              display_project(); 
         
                               
      }
  }
  
 $pid=$_REQUEST['pn']. '/' . $_REQUEST['or'];


            $path="../ps/uploads/$pid";
           //  echo "<script>alert('$path')</script>";
            $file_display = array('jpg', 'jpeg', 'png', 'gif');
            if(is_dir($path))
            {
            $files_count= count(glob($path.'/'.'*'));
         //   echo "<script>alert('lol')</script>";
            echo $path ;
            ?>
<center>
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
            $arr = explode(".", $filename, 2);  
                    $_SESSION['filename'] = $arr[0];
                    
              }
            }
          }   
          }
       
            
            ?>
      </ul>
      <span class="button prevButton"></span>
      <span class="button nextButton"></span></div>
      <?php
}

?>
