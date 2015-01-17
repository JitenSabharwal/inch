
 <?php
$id_search=mysqli_query($con,"SELECT max(qu_quid) as maximumw from qut_quote");

while ($row=mysqli_fetch_array($id_search))
 {
    //echo "working";
    if(empty($row['maximumw']))
    {
      $id_no="QU-00001";
    }
    else
    {
      if(intval(substr($row['maximumw'], 4))==99999)
      {
        $str=substr($row['maximumw'],0,2);
        ++$str;
        $id_no=$str.'-00001';
       
      }
      else
        $id_no=++$row['maximumw'];      
    }
    
  }
  $_SESSION['qu_id']=$id_no;
 // echo $_SESSION['wo_id'];


?>
 <?php
$id_search=mysqli_query($con,"SELECT max(ve_veid) as maximump from ven_vendor");

while($row=mysqli_fetch_array($id_search))
 {
    //echo "working";
    if(empty($row['maximump']))
    {
      $id_no="VE-00001";
    }
    else
    {
      if(intval(substr($row['maximump'], 4))==99999)
      {
        $str=substr($row['maximump'],0,2);
        ++$str;
        $id_no=$str.'-00001';
       
      }
      else
        $id_no=++$row['maximump'];      
    }
    
  }
  $_SESSION['vid']=$id_no;
 // echo $_SESSION['po_id'];

?>
<?php

?>