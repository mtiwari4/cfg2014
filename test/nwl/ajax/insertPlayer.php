
<?php
if($_SERVER['REQUEST_METHOD'] == "POST" || isset($_POST['submit'])){
$con=mysqli_connect("students","z1727212","19890120","z1727212");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $obj = json_decode( $_POST['formData']);
  $playerImg = '../csci566/upload/thumbs/players/Tennesse.jpg';
  $playerThumbImg = '../csci566/upload/thumbs/teams/image256517.jpg';

  $sql="INSERT INTO z1727212.Player VALUES(null,'$obj->myFnameBox','$obj->myLnameBox','$obj->myWeightBox','$obj->myHeightBox','$obj->myGender','$playerImg','$playerThumbImg','$obj->myPosition','$obj->myEmail','$obj->myDate','$obj->myPhoneBox')";
 
 if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  } 

   $playerID = (int)$obj->myTeam;
  $sql="INSERT INTO z1727212.teamplayers VALUES(null,$playerID,LAST_INSERT_ID())";
  if (!mysqli_query($con,$sql))
  {
  	die('Error: ' . mysqli_error($con));
  }
  
  die( "<div align='center'>Player Added Successfully!!");

mysqli_close($con);
}
?>
