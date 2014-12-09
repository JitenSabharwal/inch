<script>
var i=1;
var total;

function change(a)
{
  i=1;

  
  while(i<=a)
  {
    total=0;
    var x='total'+i;
    var q='quantity'+i;
var tbl=document.getElementById('desc');
if(tbl==null)
{
  for(var i=1;i<tbl.rows.length;i++)
  {
        alert(tbl.rows[i].cells[2].innerHTML);
    
  }

}
    // alert(document.getElementById(q).innerHTML);
      //alert(document.getElementById('x'));
     total=parseInt(document.getElementById(q).innerHTML)*parseInt(document.getElementById('i'+i).value);
      document.getElementById(x).innerHTML=total;
    i++;
}
}

</script>


<?php
include 'connection.php';
//$total=0;
$_SESSION['j']=1;

function display()
{//echo "<td>".$_SESSION['j']
?>
	<tr>
    <td><?php echo $_SESSION['j'];?></td>
    
    <td><?php echo $_SESSION['desc']; ?></td>
    
    <td id='<?php echo "quantity".$_SESSION['j']; ?>'><?php echo $_SESSION['quantity']?></td>
    
    <td><input type="number" name="<?php echo "rate".$_SESSION['j'];?>" id="<?php echo "i".$_SESSION['j'];?>" onchange="change(<?php echo $_SESSION['j']; ?>)"></td>

    <td id="total<?php echo $_SESSION['j']; ?>"></td>
  </tr>
  <?php
//echo "rate".$_SESSION['j'];
$_SESSION['j']++;
}

$result=mysqli_query($con,"SELECT * from prj_project");
  
while($row=mysqli_fetch_array($result))
  {
    
  	if(strcmp($row['pr_prname'],$_REQUEST['pn'])==0)
  	{
  		$_SESSION['prid']=$row['pr_prid'];      
  	}
    
  }
  
  $result1=mysqli_query($con,"SELECT * from wok_order");
  $result2=mysqli_query($con,"SELECT * from pod_order");

while($row=mysqli_fetch_array($result1))
  	{
      if(strcmp($_REQUEST['or'],$row['wo_wocid'])==0)
      {
      		if(strcmp($row['wo_prid'], $_SESSION['prid'])==0)
      		{
      			$_SESSION['desc']=$row['wo_wodesc'];
      			$_SESSION['quantity']=$row['wo_woquantity'];
            $_SESSION['order']=$_REQUEST['or'];
            display();
      		}	
  	  }
   } 

while($row=mysqli_fetch_array($result2))
    {
        if(strcmp($_REQUEST['or'], $row['po_pocid'])==0)
        {
            if(strcmp($row['po_prid'], $_SESSION['prid'])==0)
            {
              $_SESSION['desc']=$row['po_podesc'];
              $_SESSION['quantity']=$row['po_poquantity'];
              $_SESSION['order']=$_REQUEST['or'];
              display();  
            }
        }
    }  
  	
  
?>