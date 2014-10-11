<?php
	
$con=mysqli_connect("students","z1727212","19890120","classicmodels");
$query = "select lastName from Employees, Offices where Employees.officeCode = Offices.officeCode and city =  '".$_POST[value]."'";
$result = mysqli_query($con,$query);

	while($record2 = mysqli_fetch_array($result))
	{
	echo '<br>This is the list of the employees working here : '.$record2['lastName'].'<br>';
	}
	
	
	
	
	

	
	
	