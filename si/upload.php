<?php
session_start();
include '../include/connection.php';include 'idgen.php';
$target_dir = "uploads/";
$targetFolder = 'uploads/'; // Relative to the root
                if(!is_dir($targetFolder.$_SESSION['pr_upload']))
                    mkdir($targetFolder.$_SESSION['pr_upload'],0777,true);
                if(!is_dir($targetFolder. '/'.$_SESSION['pr_upload']. '/' .$_SESSION['or_upload']))
                    mkdir($targetFolder. '/'.$_SESSION['pr_upload']. '/' .$_SESSION['or_upload'],0777,true);
                if(!is_dir($targetFolder.'/'.$_SESSION['pr_upload']. '/' .$_SESSION['or_upload']. '/' .$_SESSION['st_upload']))
                    mkdir($targetFolder.'/'.$_SESSION['pr_upload']. '/' .$_SESSION['or_upload']. '/' .$_SESSION['st_upload'],0777,true);
$target_dir=$target_dir.$_SESSION['pr_upload']. '/' . $_SESSION['or_upload']. '/' . $_SESSION['st_upload'].'/';


if(count(glob($target_dir.'*'))<5)
{
    echo count(glob($target_dir.'*'));

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
//echo basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else
 {
    $var=explode('.',basename($_FILES["fileToUpload"]["name"]));
    $target_file= $target_dir .$_SESSION['fi_fiid'].'.'.$var[1];
    $_SESSION['path']=$target_file;
    echo "<br>".$target_file;
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
       {
        $id=$_SESSION['st_upload']; 
        $ido=$_SESSION['or_upload'];
        $count_query=mysqli_query($con,"SELECT st_count from stg_status where st_stageid='$id'");
        $row=mysqli_fetch_array($count_query);
        echo "<br>".$row['st_count']."<br>";
        $count=$row['st_count'] + 1;
        echo "string"; "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $inserto=mysqli_query($con,"UPDATE orders SET or_status='Site Survey' where or_wopo_cid='$ido'");
      
        if($count ==5)
          {
            $inserts=mysqli_query($con,"UPDATE stg_status SET st_status='PI' ,st_count='$count' where st_stageid='$id'");
          }  
         else
         { 
            $inserts=mysqli_query($con,"UPDATE stg_status SET  st_count='$count' where st_stageid='$id'");  
          }  
        include 'filedetails.php';
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

}
header('location:si_page.php?op=overview&search=click');            

?>