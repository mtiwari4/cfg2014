<?php
if($_SERVER['REQUEST_METHOD'] == "POST" || isset($_POST['submit'])){
$con=mysqli_connect("students","z1727212","19890120","z1727212");

// Check connection
if (mysqli_connect_errno())
  {
  die("Failed to connect to MySQL: ") . mysqli_connect_error();
  }
//INSERT INTO basketball.team VALUES (null,'NIUSpartans','Dekalb','IL','Head_Coach','CoachName','IL','USA')
  $obj = json_decode( $_POST['formData']);
  $teamImgVal = "../csci566/upload/thumbs/teams/image258347.jpg";
$sql="INSERT INTO z1727212.Team VALUES(null,'$obj->teamNameBox','$obj->teamCityBox','$obj->teamStateBox','$obj->teamCountryBox','$teamImgVal','$teamImgVal',null)";
if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
  
 $sql = "select LAST_INSERT_ID()";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result))
  {
  $count = $row[0];
  }
  
echo intval($count); 

mysqli_close($con);
}

?>