<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>

   <?php
// Create connection
$con=mysqli_connect("localhost","root","aman","nwldb");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

?>
</head>
<body>


<?php

$result = mysqli_query($con,"select * from nwldb.Plant where idplant = " .  substr( $_POST["id"],5));

while($row = mysqli_fetch_array($result))
  {
  $id =       $row['idplant'];
  $name     =  $row['name'];
  $city     =  $row['city'] ;
  $state    =  $row['state'];
  $zipcode    =  $row['zipcode'] ;

  //$playerImg =  $row['playerImagePath'] ;
  $plantThumbnailPath =  $row['plantThumbnailPath'] ;
  /*$position     =  $row['position'];
  $dob          = $row['dateOfBirth'];*/
  }
 echo "<div style='float: left;'>";
//echo $fname ."  ".  $lname  ; 
echo "<br><br>";
echo "<img src=" .  $plantThumbnailPath . " alt='Smiley face' width='242' height='242'>";

echo "</div>";
?>
<div style='float: right'>
<br><br>
<table style="width:300px">


<tr><td>Plant : </td><td><?php echo $name ?></td></tr>
<tr><td>City : </td><td><?php echo $city ?></td></tr>
<tr><td>State : </td><td><?php echo $state ?></td></tr>
<tr><td>Zipcode : </td><td><?php echo $zipcode ?></td></tr>

</table>
</div>
</body>
</html>