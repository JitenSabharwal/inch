<?php
include 'connection.php';
$or=$_REQUEST['or'];
//#################################################
$result=mysqli_query($con,"SELECT * from qut_quote");
$result1=mysqli_query($con,"SELECT * from prj_project");
$result2=mysqli_query($con,"SELECT * from wok_order where wo_wocid='$or'");
//###################################################
while($row=mysqli_fetch_array($result1))
  {
    
  	if(strcmp($row['pr_prname'],$_REQUEST['pn'])==0)
  	{
  		$_SESSION['prid']=$row['pr_prid'];      
  	}
    
  }

$i=0;
$quoteid=array(); 
while($row=mysqli_fetch_array($result))
{

	if(strcmp($row['qu_prid'],$_SESSION['prid'])==0)
	{
		$quoteid[$i]=$row['qu_quid'];
		$i++;
	}
	
	//echo @$quoteid[$i];
	if(strcmp($_REQUEST['quote'],'1')==0)
		{
			$comment=$_REQUEST['Quote_comment'];
			while($qid=mysqli_fetch_array($result2))
			{
				$id=$qid['wo_quoteid1'];
			}			
			$insert=mysqli_query($con,"UPDATE qut_quote SET qu_picomment='$comment' WHERE qu_quid='$id'");
			
		}
else if(strcmp($_REQUEST['quote'],'2')==0)
		{
			$comment=$_REQUEST['Quote_comment'];
			while($qid=mysqli_fetch_array($result2))
			{
				$id=$qid['wo_quoteid2'];
			}
			$insert=mysqli_query($con,"UPDATE qut_quote SET qu_picomment='$comment' WHERE qu_quid='$id'");
			
		}
else if(strcmp($_REQUEST['quote'],'3')==0)
		{
			$comment=$_REQUEST['Quote_comment'];
			while($qid=mysqli_fetch_array($result2))
			{
				$id=$qid['wo_quoteid3'];
			}
			$wo=$_REQUEST['or'];
			//echo $id;
			//echo $comment;			
			$insert=mysqli_query($con,"UPDATE qut_quote SET qu_picomment='$comment' WHERE qu_quid='$id'");
			if(empty($insert))
			{
				echo "error";
			}
			else
			{
				$or=mysqli_query($con,"UPDATE orders SET or_status='Quote Approved' WHERE or_wopo_cid='$wo'");
				if(empty($or))
				{
					echo "error";
				}
			}
		}
		if(empty($insert))
		{
			echo "error";
		}
	}

?>