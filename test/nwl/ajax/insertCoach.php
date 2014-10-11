<?php
if($_SERVER['REQUEST_METHOD'] == "POST" || isset($_POST['submit'])){
$con=mysqli_connect("students","z1727212","19890120","z1727212");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $obj = json_decode( $_POST['formData']);
  
$sql="INSERT INTO z1727212.Coach VALUES(null,'$obj->coachFnameBox','$obj->coachLnameBox','$obj->coachGender','$obj->coachAreaBox','$obj->coachTelBox','$obj->coachMobileBox','$obj->coachEmail')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
$sql =  "select LAST_INSERT_ID()";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result))
{
	$count = $row[0];
}

echo intval($count);
mysqli_close($con);
}
?>