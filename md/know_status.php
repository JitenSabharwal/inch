<style type="text/css">
.highlight{color: green;}
.mark{color:red;}
</style>
<br><br>
<table width="700"  class="table table-hover tab-border" >
	<tr>
		<td>Current Status of the Project:</td>
	</tr>
<?php

include '../include/connection.php';
$sq1=mysqli_query($con,"SELECT * from orders");

while ($r=mysqli_fetch_array($sq1)) {

	if(strcmp($r['or_prjname'],@$_REQUEST['pn'])==0)
	{
	
	echo "<tr>";
	switch ($r['or_status']) {
			case 'Project Created':
			echo "<td class='mark'>PM needs to request for a quote.</td>";		
			continue;
			case 'Request For a Quote':
				echo "<td class='mark'>PS needs to review the quote</td>";
				continue;
			case 'Review The Quote':
			echo "<td class='mark'>PI needs to approve the quote</td>";
			case 'Quote Approved':
				echo "<td class='mark'>PM needs to send Create WO request to PS</td>";
				continue;
			case 'Create WO':
				echo "<td class='mark'>PM needs to send Create PO request to PS</td>";
				continue;
			case 'Create PO':
				echo "<td class='mark'>PM needs to approve WO/PO</td>";
				continue;
			case 'WO Created(PM Approval)':
				echo "<td class='mark'>PM needs to Approve WO</td>";
				continue;
			case 'PO Created(PM Approval)':
				echo "<td class='mark'>PM needs to Approve PO</td>";
				continue;
			case 'WO(FS Checks Fund)':
				echo "<td class='mark'>FS needs to check fund for WO</td>";
				continue;
			case 'PO(FS Checks Fund)':
				echo "<td class='mark'>FS needs to check fund for PO</td>";
				continue;
			case 'WO(MD Approval)':
				echo "<td class='mark'>MD needs to approve WO</td>";
				continue;
			case 'PO(MD Approval)':
				echo "<td class='mark'>MD needs to approve PO</td>";
				continue;
			case 'WO Approved':
				echo "<td class='mark'>MD needs to approve PO</td>";
				continue;
			case 'PO Approved':
				echo "<td class='mark'>PS needs to close PO</td>";
				continue;
			case 'PO Closed':
				echo "<td class='mark'>Project is done.</td>";
				continue;
		
		default:
			continue;
	}
}
echo "</tr>";
}
?>

</table>