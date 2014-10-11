<?php 
	

$con=mysqli_connect("students","z1727212","19890120","classicmodels");

$result = mysqli_query($con,"select * From Offices");


	$rows = array();
	while($row = mysqli_fetch_array($result))
	{
		$rows[$row[1]] = $row[0];
		}
		echo json_encode($rows);
