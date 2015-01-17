 <?php
 include '../include/connection.php';
    $id_search=mysqli_query($con,"SELECT max(fi_fiid) as maximumpc from fid_file");

    while ($row=mysqli_fetch_array($id_search))
     {
        //echo "working";
        if(empty($row['maximumpc']))
        {
          $id_no="FI-00001";
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
      $_SESSION['fi_fiid']=$id_no;
    echo $_SESSION['fi_fiid'];

?>

   