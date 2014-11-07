<?php
$con=mysqli_connect("localhost","root","","dbms");

  $sq="SELECT * from usx_user";
  $result=mysqli_query($con,$sq);

//$id_no="";
  

$id_search=mysqli_query($con,"SELECT max(pr_prid) as maximum from prj_project");



while ($row=mysqli_fetch_array($id_search))
 {
    if(empty($row['maximum']))
    {
      $id_no="PJ-00001";
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
 
?>
                                                                        