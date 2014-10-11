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
				<td colspan="6" align="center"><label >Coaches</label>
				</td>
				
			<tr>
				<td><label >FirstName</label></td>
				<td><label >LastName</label></td>
				<td><label >Address</label></td>
				<td><label >Phone</label></td>
				<td><label >Mobile</label></td>
				<td><label >Email</label></td>
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
			$result = mysqli_query($con,"select * from z1727212.Coach");
			while($row = mysqli_fetch_array($result)) {
			echo "<tr>";
				echo "<td>" . $row['firstName'] . "</td>"; 
				echo "<td>" . $row['lastName'] . "</td>";
				echo "<td>" . $row['address'] . "</td>"; 
				echo "<td>" . $row['phone'] . "</td>";
				echo "<td>" . $row['mobile'] . "</td>";
				echo "<td>" . $row['email'] . "</td>";
				echo "</tr>";
			}
?>
    </tbody>
    
</table>
</body>
</html>