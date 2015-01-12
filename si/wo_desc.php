<?php
include 'connection.php';

$c=mysqli_query($con,"SELECT wo_wocid,wo_wodesc,wo_woquantity from wok_order" );

?>
<div align="center">
	<table width="700" class="tab-border table">
		<tr>
			<td>WC ID</td>
			<td>WO Desc</td>
			<td>WO Quantity</td>

		</tr>

		<?php
			while ($row=mysqli_fetch_array($c)) {

				# code...
				if(strcmp($row['wo_wocid'], @$_REQUEST['or'])==0)
				{
				?>
				<tr>
					<td>
						<?php echo $row['wo_wocid']; ?></td>
						<td>
						<?php echo $row['wo_wodesc']; ?></td>
						<td>
						<?php echo $row['wo_woquantity']; ?></td>
					</tr>
		<?php
			}
		}
		?>



	</table>
</div>