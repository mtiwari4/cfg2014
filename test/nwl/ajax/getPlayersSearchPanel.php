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
				<td colspan="9" align="center"><label >Animals</label>
				</td>
				
			<tr>
				<td><label >Animal Name</label></td>
				<td><label >Plant Name</label></td>
				<td><label >city</label></td>
				<td><label >state</label></td>
				<td><label >zipcode</label></td>
				
			</tr>
		</thead>
    <tbody>
			
			<?php
				$con=mysqli_connect("localhost","root","cfg2014!","nwa");
			
			// Check connection
			if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			
			$result = mysqli_query($con,"SELECT an.common_name AS name, p.common_name AS common, a.city, a.zipcode, a.state
FROM animal an, endangered e, plant p, plant_locations pl, address a
WHERE an.animal_id = e.animal_id
AND e.plant_id = p.plant_id
AND p.plant_id = pl.plant_id
AND pl.location_id = a.address_id");

			while($row = mysqli_fetch_array($result)) {
			echo "<tr>";
				echo "<td>" . $row['name'] . "</td>"; 
				echo "<td>" . $row['common'] . "</td>";
				echo "<td>" . $row['city'] . "</td>";
				echo "<td>" . $row['state'] . "</td>"; 
				echo "<td>" . $row['zipcode'] . "</td>";
			
				echo "</tr>";
			}
?>
			
			
    </tbody>

</table>
</body>
</html>