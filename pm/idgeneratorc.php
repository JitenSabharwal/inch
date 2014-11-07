<?php
session_start();
include 'connection.php'
?>
 <?php
 
    $id_search=mysqli_query($con,"SELECT max(wo_wocid) as maximumwc from wok_order");

    while ($row=mysqli_fetch_array($id_search))
     {
        //echo "working";
        if(empty($row['maximumwc']))
        {
          $id_no="WC-00001";
        }
        else
        {
          if(intval(substr($row['maximumwc'], 4))==99999)
          {
            $str=substr($row['maximumwc'],0,2);
            ++$str;
            $id_no=$str.'-00001';
           
          }
          else
            $id_no=++$row['maximumwc'];      
        }
        
      }
      $_SESSION['wo_cid']=$id_no;
//      echo $_SESSION['wo_cid'];

?>
 <?php
    $id_search=mysqli_query($con,"SELECT max(po_pocid) as maximumpc from pod_order");

    while ($row=mysqli_fetch_array($id_search))
     {
        //echo "working";
        if(empty($row['maximumpc']))
        {
          $id_no="PC-00001";
        }
        else
        {
          if(intval(substr($row['maximumpc'], 4))==99999)
          {
            $str=substr($row['maximumpc'],0,2);
            ++$str;
            $id_no=$str.'-00001';
           
          }
          else
            $id_no=++$row['maximumpc'];      
        }
        
      }
      $_SESSION['po_cid']=$id_no;
  //    echo $_SESSION['po_cid'];

?>

   