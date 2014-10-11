<html>
  <head>
  <style type="text/css">

td {
    border: 1px solid #000;
    padding: 0.4em 1em;
    background-color: #fff;
}

td.searchResult {
    background-color: #ffa;
}
td.faded {
    opacity: 0.2;
}
</style>
</head>
   <body>
<table>

 <thead>
			<tr>
				<td colspan="9" align="center"><label >Players</label>
				</td>
				
			<tr>
				<td><label >FirstName</label></td>
				<td><label >LastName</label></td>
				<td><label >Weight</label></td>
				<td><label >Height</label></td>
				<td><label >gender</label></td>
				<td><label >position</label></td>
				<td><label >email</label></td>
				<td><label >dateOfBirth</label></td>
				<td><label >phone</label></td>
			</tr>
		</thead>
    <tbody>
			
			<?php
			$con=mysqli_connect("students","z1727212","19890120","z1727212");
			
			// Check connection
			if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			$result = mysqli_query($con,"select * from z1727212.Player");
			while($row = mysqli_fetch_array($result)) {
			echo "<tr>";
				echo "<td>" . $row['FirstName'] . "</td>"; 
				echo "<td>" . $row['LastName'] . "</td>";
				echo "<td>" . $row['Weight'] . "</td>"; 
				echo "<td>" . $row['Height'] . "</td>";
				echo "<td>" . $row['gender'] . "</td>";
				echo "<td>" . $row['position'] . "</td>";
				echo "<td>" . $row['email'] . "</td>";
				echo "<td>" . $row['dateOfBirth'] . "</td>";
				echo "<td>" . $row['phone'] . "</td>";
				echo "</tr>";
			}
?>
			
			
    </tbody>

</table>
</body>
</html>