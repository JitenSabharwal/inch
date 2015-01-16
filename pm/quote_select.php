<br>
<br>

<table width="800" class="table table-hover tab-border">
    <tr>
      <td>Project Name </td>
      <td>Description</td>
      <td>Quantity</td>
      <td>Quote1</td>
      <td>Quote2</td>
      <td>Quote3</td>
    </tr>
 
<?php

function displayq()
{
?>	
		<tr>
		<td><?php echo $_REQUEST['pn']; ?></td>
		<td><?php echo $_SESSION['desc'];?></td>
		<td><?php echo $_SESSION['quan'];?></td>
		<td><?php echo $_SESSION['q1'];?></td>
		<td><?php echo $_SESSION['q2'];?></td>
		<td><?php echo $_SESSION['q3'];?></td>
		</tr>

<?php
}
#########################
$result=mysqli_query($con,"SELECT * from qut_quote a,ven_vendor b WHERE a.qu_venid=b.ve_veid ");
$result1=mysqli_query($con,"SELECT * from wok_order ");
$result2=mysqli_query($con,"SELECT * from pod_order ");
$result3=mysqli_query($con,"SELECT * from orders");
$result4=mysqli_query($con,"SELECT * from prj_project");

#########################
while($row=mysqli_fetch_array($result3))
{
	if(strcmp($row['or_prjname'],$_REQUEST['pn'])==0)
	{
		$_SESSION['prid']=$row['or_prid'];
	}
}
while($row=mysqli_fetch_array($result1))
{
	if(strcmp($row['wo_wocid'],$_REQUEST['or'])==0)
	{
		$_SESSION['desc']=$row['wo_wodesc'];
		$_SESSION['quan']=$row['wo_woquantity'];
		$_SESSION['q1']=$row['wo_rateq1'];
		$_SESSION['q2']=$row['wo_rateq2'];
		$_SESSION['q3']=$row['wo_rateq3'];
		$_SESSION['id1']=$row['wo_quoteid1'];
		$_SESSION['id2']=$row['wo_quoteid2'];
		$_SESSION['id3']=$row['wo_quoteid3'];		
		displayq();
	}
}
while($row=mysqli_fetch_array($result2))
{
	if(strcmp($row['po_pocid'],$_REQUEST['or'])==0)
	{
		$_SESSION['desc']=$row['po_podesc'];
		$_SESSION['quan']=$row['po_poquantity'];
		$_SESSION['q1']=$row['po_rateq1'];
		$_SESSION['q2']=$row['po_rateq2'];
		$_SESSION['q3']=$row['po_rateq3'];
		$_SESSION['id1']=$row['po_quoteid1'];
		$_SESSION['id2']=$row['po_quoteid2'];
		$_SESSION['id3']=$row['po_quoteid3'];		
		displayq();
	}		
}
?>
</table>
<br>
<br>
<div>
	
<form name="formc" method="POST" action="quote_finalize.php?op=<?php echo $_REQUEST['op']; ?>&search=click&pn=<?php echo $_SESSION['project_name']?>&or=<?php echo $_REQUEST['or']; ?>&po=click&wo=create&in=insert&st=quote" onsubmit="return confirm5();">
<h3>Comments</h3>
<table width="700" border="3" cellspacing="10" style="text-align:center">
	<tr>
		<td>
			Quote
		</td>
		<td> 
			Name
		</td>
		<td>
			Designation
		</td>
		<td>
			Vendor Name
		</td>
		<td>
			Contact
		</td>
		<td>
			Quote comments by Pi
		</td>
		
	</tr>
<?php
$_SESSION['j']=1;
 function display_quotes()
	{
		?>
		<tr>
		<td><?php echo "Quote".$_SESSION['j'];?></td>	
		<td><?php echo @$_SESSION['name'];?></td>
		<td><?php echo "Pi";?></td>
		<td><?php echo @$_SESSION['vname'];?></td>
		<td><?php echo @$_SESSION['contact1'];?></td>
		<td><?php echo @$_SESSION['c'];?></td>
		<!--td><textarea name="A_comment" cols="50" rows="4" maxlength="200" placeholder="Comment Here"></textarea></td-->
	</tr>
	<?php
	$_SESSION['j']++;
	}
	while($row=mysqli_fetch_array($result))
	{
			if($row['qu_quid']==$_SESSION['id1'])
			{
				$_SESSION['c']=$row['qu_picomment'];
				$_SESSION['vname']=$row['ve_vname'];
				$_SESSION['contact1']=$row['ve_contact1'];
				while($rowp=mysqli_fetch_array($result4))
				{
					if($rowp['pr_prname']==$_REQUEST['pn'])
					{
						$_SESSION['name']=$rowp['pr_pi'];	
					}
				}
				display_quotes();
			}
			if($row['qu_quid']==$_SESSION['id2'])
			{
				$_SESSION['c']=$row['qu_picomment'];
				$_SESSION['vname']=$row['ve_vname'];
				$_SESSION['contact1']=$row['ve_contact1'];
				display_quotes();
			}
			if($row['qu_quid']==$_SESSION['id3'])
			{
				$_SESSION['c']=$row['qu_picomment'];
				$_SESSION['vname']=$row['ve_vname'];
				$_SESSION['contact1']=$row['ve_contact1'];
				display_quotes();
			}
			
	}

	?>
</table>
<br>
<br>
<h3>Selection </h3>
<table border=2 width=400>	
	<tr>
		
		<td><input type="radio" name="quote" id="1" value="Quote1">Quote1 </td>
		<td><input type="radio" name="quote" id="2" value="Quote2">Quote2	</td>
		<td><input type="radio" name="quote" id="3" value="Quote3">Quote3	</td>
		<td><input type="radio" name="quote" id="4" value="Reject All">Reject All	</td>
		
	</tr>	
</table>
<br>


<input type="submit"/>		
</form>
	</div>
<script>
function confirm5()
{	
	if(document.formc.A_comment.value=='')
		{
			alert('Please Enter the Comment!')
			return false;
		}	
	if(document.formc.quote.value=='')
		{
			alert('Please Select anyone of the option!')
			return false;
		}	
	if(confirm("Are you Sure You want to continue?"))
		{
		  return true;
		}
		else
		{
		  return false;
		}
		
		
}		
</script>