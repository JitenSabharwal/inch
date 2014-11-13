<?php
$x=1;
include 'connection.php';
    $count=1;
if($_SESSION['order']=="wo")
{
    while (isset($_REQUEST['description-'.$count]))
     {

      $desc=$_REQUEST['description-'.$count];
      $per=$_REQUEST['percentage-'.$count];
     // echo $desc;

$id_search=mysqli_query($con,"SELECT max(st_stid) as maximum from stg_stage");

          

              while ($row=mysqli_fetch_array($id_search))
               {
                  if(empty($row['maximum']))
                  {
                    $id_no="ST-00001";
                  }
                  else
                  {
                    if(intval(substr($row['maximum'], 4))==99999)
                    {
                      $str=substr($row['maximum'],0,2);
                      ++$str;
                      $id_no=$str.'-00001';
                     
                    }
                    else
                      $id_no=++$row['maximum'];      

                  }
                }
   
    $wo=$_REQUEST['or'];
      $insert="INSERT INTO stg_stage(st_stid,st_stdesc,st_woid,st_strate) VALUES('$id_no','$desc','$wo','$per')";
      mysqli_query($con,$insert);
    $count++;
    if(empty($insert))
    {
        echo "Error";
        $x=-100;
    }
    else
    {
      $in="INSERT INTO stg_status(st_stageid,st_woid,st_status) VALUES('$id_no','$wo','SI')";    
      mysqli_query($con,$in);
    }
    }
    
}     
?>