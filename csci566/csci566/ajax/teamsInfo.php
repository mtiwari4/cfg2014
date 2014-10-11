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
$q="select * from z1727212.team where Team_ID = " .  substr( $_POST["id1"],5);
$result = mysqli_query($con,"select * from z1727212.Team where Team_ID = " .  substr( $_POST["id1"],5));

while($row = mysqli_fetch_array($result))
  {
  $id 		 =  $row['Team_ID'];
  $teamName  =  $row['TeamName'];
  $city      =  $row['City'] ;
  
  $state   =  $row['State'] ;
  $country    =  $row['Country'] ;
  $teamImg =  $row['teamImagePath'] ;
  $teamThumbnail =  $row['teamThumbnailPath'] ;
 
  }
 echo "<div style='float: left;'>";
echo $teamName ; 
echo "<br><br>";
echo "<img src=" .  $teamThumbnail . " alt='Smiley face' width='242' height='242'>";

echo "</div>";
?>
<div style='float: right'>
<br><br>
<table style="width:300px">

<tr><td>Name : </td><td><?php echo $teamName ?></td> </tr>
<tr><td>City : </td><td><?php echo $city ?></td></tr>

<tr><td>State : </td><td><?php echo $state ?></td></tr>
<tr><td>Country : </td><td><?php echo $country ?></td></tr>



</table>
</div>
</body>
</html>