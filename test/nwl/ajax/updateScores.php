<?php
if($_SERVER['REQUEST_METHOD'] == "POST" || isset($_POST['submit'])){
$con=mysqli_connect("students","z1727212","19890120","z1727212");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $obj = json_decode( $_POST['formData']);
  $winningTeamID=(($obj->awayTeamBox > $obj->homeTeamBox)? $obj->awayTeam : $obj->homeTeam);
  
$sql = "UPDATE z1727212.Game SET homeScore=$obj->homeTeamBox ,awayScore=$obj->awayTeamBox , winningTeamID= $winningTeamID where homeTeamID=$obj->homeTeam and awayTeamID=$obj->awayTeam";
 if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
   die( "<div align='center'>Scores updated Successfully!!");

mysqli_close($con);
}
?>