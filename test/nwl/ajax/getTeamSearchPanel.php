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
			<tr><td colspan="4" align="center"><label >Plants </label></td>				
			<tr>
				
				<td><label >Plant</label></td>
				<td><label >City</label></td>
				<td><label >State</label></td>
				<td><label >Zipcode</label></td>
			</tr>
		</thead>
    <tbody>
			
			<?php
			//$con=mysqli_connect("localhost","root","aman","nwldb");
			$con=mysqli_connect("localhost","root","cfg2014!","nwa");
			// Check connection
			if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			$result = mysqli_query($con,"select p.common_name, a.city, a.state, a.zipcode from address a, plant p, plant_locations pl 
where
p.plant_id=pl.plant_id and pl.location_id= a.address_id");
			while($row = mysqli_fetch_array($result)) {
			echo "<tr>";
			
				echo "<td>" . $row['common_name'] . "</td>"; 
				
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