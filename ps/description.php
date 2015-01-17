
<script>
var i=1;
var total;

function change(a)
{
var qty=document.getElementById('quantity'+a).innerHTML;
var rt=document.getElementById('i'+a).value;
document.getElementById('total'+a).innerHTML=qty*rt;
}
</script>


<?php
include 'connection.php';
//$total=0;
$_SESSION['j']=1;

function display()
{
?>
  <tr>
    <td><?php echo $_SESSION['j'];?></td>
    
    <td><?php echo $_SESSION['desc']; ?></td>
    
    <td id='<?php echo "quantity".$_SESSION['j']; ?>'><?php echo $_SESSION['quantity']?></td>
    
    <td><input type="text" pattern="^[0-9]"   name="<?php echo "rate".$_SESSION['j'];?>" id="<?php echo "i".$_SESSION['j'];?>" onkeyup="change(<?php echo $_SESSION['j']; ?>)"></td>

    <td id="total<?php echo $_SESSION['j']; ?>"></td>
  </tr>
  <?php
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