<?php
	
$con=mysqli_connect("students","z1727212","19890120","classicmodels");

$query = "select lastName, firstName, city, state from Employees, Offices where Employees.officeCode = Offices.officeCode and lastName = '".$_POST[value]."'";
$result = mysqli_query($con,$query);

	while($record2 = mysqli_fetch_array($result))
	{
		echo '<br>The employee name is : '.$record2['lastName'].$record2['firstName'].' working at '.$record2['city']. ','.$record2['state'].'<br>';
	}
	
	
	
	
	

	
	
	