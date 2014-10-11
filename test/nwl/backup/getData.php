<?php 

echo "<table border='1'>
<tr>
<th>FirstName</th>
<th>LastName</th>
<th>city</th>
<th>state</th>
</tr>";
echo "<br>";

$con=mysqli_connect("students","z1727212","19890120","classicmodels");
	
$quer1= "select firstName,lastName,city,state from Employees,Offices where Employees.officeCode=Offices.officeCode and lastName LIKE '%".$_POST[value]."'";
$result = mysqli_query($con,$quer1);

while($row = mysqli_fetch_array($result))
{
	echo "<tr>";
	echo "<td>" . $row['firstName'] .  "</td>";
	echo "<td>" . $row['lastName'] . "</td>";
	echo "<td>" . $row['city'] .  "</td>";
	echo "<td>" . $row['state'] . "</td>";
	
	 
	 
	echo "</tr>";
}
echo "</table>";

?>