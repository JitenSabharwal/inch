<?php
session_start();

?>

 <?php

    $id_search=mysqli_query($con,"SELECT max(wo_woid) as maximumw from wok_order");

    while ($row=mysqli_fetch_array($id_search))
     {
        //echo "working";
        if(empty($row['maximumw']))
        {
          $id_no="WO-00001";
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
      $_SESSION['wo_id']=$id_no;
    //  echo $_SESSION['wo_id'];

?>
 <?php

    $id_search=mysqli_query($con,"SELECT max(po_poid) as maximump from pod_order");

    while ($row=mysqli_fetch_array($id_search))
     {
        //echo "working";
        if(empty($row['maximump']))
        {
          $id_no="PO-00001";
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
      $_SESSION['po_id']=$id_no;
    //  echo $_SESSION['po_id'];

?>
