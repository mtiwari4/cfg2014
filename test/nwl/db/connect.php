<?php


// Create connection
$con=mysqli_connect("students","z1727212","19890120","z1727212");

$sql="SELECT * from basketball.player )";


// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $result = mysqli_query($con,"select * from z1727212.Marina");
  
  echo "<table border='1'>
<tr>
<th>MarinaNum</th>
<th>Name</th>
<th>Area</th>
<th>city</th>
<th>state</th>
<th>zip</th>
</tr>";
  
  while($row = mysqli_fetch_array($result))
  {
  	echo "<tr>";
  	echo "<td>" . $row['MarinaNum'] .  "</td>";
  	echo "<td>" . $row['Name'] . "</td>";
  	
  	
  	echo "<td>" . $row['Address'] . "</td>";
  	echo "<td>" . $row['City'] . "</td>";
  	echo "<td>" . $row['State'] . "</td>";
  	echo "<td>" . $row['Zip'] . "</td>";
  	
  	echo "</tr>";
  }
  echo "</table>";
  
mysqli_close($con);
?>