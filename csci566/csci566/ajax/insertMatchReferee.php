<?php
if($_SERVER['REQUEST_METHOD'] == "POST" || isset($_POST['submit'])){


// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $obj = json_decode( $_POST['response']);
  $gameID=$_POST['data'];
  foreach ($obj as $value) {
  	$con=mysqli_connect("students","z1727212","19890120","z1727212");
  	if($value){
  	$sql="INSERT INTO z1727212.matchreferee VALUES(null,$gameID,$value)";

  	if (!mysqli_query($con,$sql))
  	{
  		die('Error: ' . mysqli_error($con));
  	}
  	}
  }
die("<div align='center'>Game Added Successfully!!</div>");

mysqli_close($con);
}
?>