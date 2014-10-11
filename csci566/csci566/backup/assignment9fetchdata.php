<?php
	include_once'dbconnection.php';
//FUNCTION TO ESTABLISH CONNECTION
function connect()
	{
	mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die('Not able to connect to DataBase '. mysql_error());
	mysql_select_db(DB_NAME);
	}
	

//FUNCTION TO FETCH DATA INTO DROP DOWN LIST FOR LASTNAMES
function dropquery()
	{
	$dropdata = mysql_query("select * FROM Employees"); 
	while($record1 = mysql_fetch_array($dropdata))
	{
	echo '<option value="' . $record1['lastName'].'">'.$record1['lastName'].'</option>'; 
	}
	}
//FUNCTION TO STORE THE SELECTED DROPDOWN VALUE INTO A VARIABLE	
function getinputforp1()
	{
	$valfromdrop1 = trim($_POST['Employees']);
	}
	
//FUNCTION TO FETCH DATA FOR THE SELECTED VALUE IN  DROP DOWN LIST(LASTNAMES)
function fetchquery()
	{
		connect();
//echo "valeeeeeeeee".$_valfromdrop1;	
	$fetchdata = mysql_query("select lastName, firstName, city, state from Employees, Offices where Employees.officeCode = Offices.officeCode and lastName = '$_valfromdrop1' ");
	echo "Here".$fetchdata.$_valfromdrop1;
	while($record2 = mysql_fetch_array($fetchdata))
	{
	echo 'The employee name is : '.$record2['lastName'].$record2['firstName'].' working at '.$record2['city']. ','.$record2['state'].'<br>';
	}
	}

//FUNCTION TO FETCH THE DATA INTO DROPDOWN LIST FOR CITY
function seconddropquery()
	{
	$seconddropdata = mysql_query("select * From Offices");
	while($record3 = mysql_fetch_array($seconddropdata))
	{
	echo '<option value="' . $record3['city'].'">'.$record3['city'].'</option>';
	}
	}
//FUNCTION TO STORE THE SELECTED DROPDOWN VALUE INTO A VARIABLE
function getinputforp2()
	{
	$valfromdrop2 = trim($_POST['city']);
	}	
	
//FUNCTION TO FETCH DATA FOR SELECTED DROP DOWN VALUE	
function secondfetchquery()
	{
	$secondfetchdata = mysql_query("select lastName from Employees, Offices where Employees.officeCode = Offices.officeCode and city = '$valfromdrop2' ");
	while($record4 = mysql_fetch_array($secondfetchdata))
	{
	echo 'This is the list of the employees working here : '.$record4['lastName'].'<br>';
	}
	}
?>



