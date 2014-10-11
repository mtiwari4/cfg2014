<?php

$con=mysqli_connect("localhost","root","cfg2014!","nwa");


$result = mysqli_query($con,"select * from nwa.user");

echo"hi";
while($row = mysqli_fetch_array($result)) {
	echo "<tr>";
	//echo "<td>" . $row['idevent'] . "</td>";
	echo "<td>" . $row['user_id'] . "</td>";
	
}

	echo "bye";
?>