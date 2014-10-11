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
			<tr><td colspan="4" align="center"><label >Teams </label></td>				
			<tr>
				
				<td><label >TeamName</label></td>
				<td><label >City</label></td>
				<td><label >State</label></td>
				<td><label >Country</label></td>
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
			$result = mysqli_query($con,"select * from z1727212.Team");
			while($row = mysqli_fetch_array($result)) {
			echo "<tr>";
				echo "<td>" . $row['TeamName'] . "</td>"; 
				echo "<td>" . $row['City'] . "</td>";
				echo "<td>" . $row['State'] . "</td>"; 
				echo "<td>" . $row['Country'] . "</td>";
				echo "</tr>";
			}
?>
			
			
    </tbody>
</table>
</body>
</html>