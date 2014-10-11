<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>

   <?php
// Create connection
$con=mysqli_connect("students","z1727212","19890120","z1727212");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

?>
</head>
<body>


<?php

$result = mysqli_query($con,"select * from z1727212.Player where idplayer = " .  substr( $_POST["id"],5));

while($row = mysqli_fetch_array($result))
  {
  $id =       $row['idplayer'];
  $fname     =  $row['FirstName'];
  $lname     =  $row['LastName'] ;
  $weight    =  $row['Weight'];
  $height    =  $row['Height'] ;

  $playerImg =  $row['playerImagePath'] ;
  $playerThumbnail =  $row['playerThumbnailPath'] ;
  $position     =  $row['position'];
  $dob          = $row['dateOfBirth'];
  }
 echo "<div style='float: left;'>";
echo $fname ."  ".  $lname  ; 
echo "<br><br>";
echo "<img src=" .  $playerThumbnail . " alt='Smiley face' width='242' height='242'>";

echo "</div>";
?>
<div style='float: right'>
<br><br>
<table style="width:300px">

<tr><td>Born : </td><td><?php echo $dob ?></td> </tr>
<tr><td>Height : </td><td><?php echo $height ?></td></tr>
<tr><td>Weight : </td><td><?php echo $weight ?></td></tr>
<tr><td>Position : </td><td><?php echo $position ?></td></tr>



</table>
</div>
</body>
</html>