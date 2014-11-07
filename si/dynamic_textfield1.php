<html>
<head>
<title>Adding and Removing Text Boxes Dynamically</title>
<script type="text/javascript">
var intTextBox=0;

//FUNCTION TO ADD TEXT BOX ELEMENT
function addElement()
{
intTextBox = intTextBox + 1;
/*var contentID = document.getElementById('content');
var newTBDiv = document.createElement('div');
newTBDiv.setAttribute('id','strText'+intTextBox);
var html = '<table width="200" border="1"><tr><th scope="col">Sno</th><th scope="col">Description</th><th scope="col">Quality</th><th scope="col">Type</th></tr>';*/

    var table = document.getElementById("myTable");
    var row = table.insertRow(intTextBox);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
	var cell3 = row.insertCell(2);
	//var cell4 = row.insertCell(3);
	cell1.id="myRow";
	cell2.id="myRow";
	cell3.id="myRow";
	//cell4.id="myRow";
    cell1.innerHTML = intTextBox;
    cell2.innerHTML = "<input type='text' id='" + intTextBox + "' name='description-" + intTextBox + "'/>";
	cell3.innerHTML = "<input type='text' id='" + intTextBox + "' name='percentage-" + intTextBox + "'/>";
	//cell4.innerHTML = "<select name='work_type-"+ intTextBox +"' id='work_type"+ intTextBox +"'><option value='carpenter'>carpenter</option><option value='painter'>painter</option><option value='civil'>civil</option><option value='tiles'>tiles</option></select>";

/*  newTBDiv.innerHTML = "<table width='200' border='1'><tr><th scope='col'>Sno</th><th scope='col'>Description</th><th scope='col'>Quality</th><th scope='col'>Type</th></tr><tr><td>"+intTextBox+"</td><td><input type='text' id='" + intTextBox + "' name='description-" + intTextBox + "'/></td><td><input type='text' id='" + intTextBox + "' name='quantity-" + intTextBox + "'/></td><td><select name='work_type-"+ intTextBox +"' id='work_type"+ intTextBox +"'><option value='carpenter'>carpenter</option><option value='painter'>painter</option><option value='civil'>civil</option><option value='tiles'>tiles</option></select></td></tr>";*/
/*contentID.appendChild(newTBDiv);
*/

}

function a()
{
    alert(intTextBox);
}

//FUNCTION TO REMOVE TEXT BOX ELEMENT
function removeElement()
{
if(intTextBox != 0)
{

document.getElementById("myTable").deleteRow(intTextBox);



intTextBox = intTextBox-1;
}
}
</script>
</head>
<body>

<p><input type="button" value="Add" onclick="addElement();"><input type="button" value="Remove" onclick="removeElement();"></p>

<table width="700" border="1" id="myTable">
  <tr>
    <td>Stages</td>
    <td>Description</td>
    <td>Percentage</td>
    
  </tr>
</table>

</body>
</html> 


