<?php
session_start();
include 'connection.php';
 			 
$check=0;
$pn=$_REQUEST['pn'];
//echo $pn;
$result=mysqli_query($con,"SELECT * from prj_project");
while($row=mysqli_fetch_array($result))
  { //echo "working";
      if(strcmp($row['pr_prname'],$pn)==0)
      {
      	 $_SESSION['project_id']   =$row['pr_prid'];
	  }
}
?>
<?php
if($_SERVER['REQUEST_METHOD']=="POST")
{

		  //$number_field=$_REQUEST['num_cat'];
		  $tbtype=$_REQUEST['typetb'];
		 // echo $tbtype;
		   	$j=1;

		   		include 'idgeneratorc.php';

			 while(isset($_REQUEST['description-'.$j]))
			  {	
			  	include 'idgenerator.php';
			  	

                  $pid=$_SESSION['project_id'];
                  //echo $pid;
			  	  $w= $_SESSION['wo_id'];
			  	  $wc= $_SESSION['wo_cid'];
			  	  $p= $_SESSION['po_id'];
			  	  $pc= $_SESSION['po_cid'];		
			  	  //echo $w;
			  	  //echo $wc;
			  	  //echo $p;
			  	  //echo $pc
				  $i=$_SESSION['SNo'];
				  $description=$_REQUEST['description-'.$j];
				  $quality=$_REQUEST['quantity-'.$j];
				  $type=$_REQUEST['work_type-'.$j];
				  $c='c'.$j;
				  if(isset($description))
				  {		
				  		//echo "working";
				  		if(strcmp($tbtype,"Workorder")==0)
				  		{
				  			//echo "working";
				  			$check=1;
				  			$inserting=mysqli_query($con,"INSERT INTO wok_order(wo_woid,wo_wocid,wo_wonum,wo_prid,wo_wodesc,wo_woquantity,wo_pspost) VALUES('$w','$wc','$c','$pid','$description','$quality','$type')");
				  	//		$insert=mysqli_query($con,);
					  	}
					  	else
					  	{
					  		$check=1;
					  		//echo "working";
					  		$inserting=mysqli_query($con,"INSERT INTO pod_order(po_poid,po_pocid,po_prid,po_podesc,po_poquantity,po_pspost) VALUES('$p','$pc','$pid','$description','$quality','$type')");	
					  	}
					  
					  if(empty($inserting))
					  	{
					  		echo "failed";
					  	}
					  $j++;
					  
				  }
		
			  	}
	//include 'idgeneratorc.php';		  	
	$wc= $_SESSION['wo_cid'];
//	echo $wc;
	$pc= $_SESSION['po_cid'];
//	echo $pc;
	$pid=$_SESSION['project_id'];
	$status="Request for quotes";
//	echo $pid;
//	echo $pn;
                  if($check==1)
                  {		
					if(strcmp($tbtype,"Workorder")==0)
				  		{
				  			//echo "working";
				  			$insert=mysqli_query($con,"INSERT INTO orders(or_prjname, or_prid, or_wopo_cid,or_status) VALUES('$pn','$pid','$wc','$status')");
					  	}
					  	else
					  	{
					  		//echo "working";
					  		$insert=mysqli_query($con,"INSERT INTO orders(or_prjname,or_prid,or_wopo_cid,or_status) VALUES('$pn','$pid','$pc','$status')");	
					  	}		  	  
			  	  	if(empty($insert))
			  	  	{
			  	  		echo "error";
			  	  	} 
			  	 }	
}

?>
