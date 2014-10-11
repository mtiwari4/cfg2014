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
$q="select * from nwldb.animal where idanimal = " .  substr( $_POST["id1"],5);
$result = mysqli_query($con,"select * from nwldb.animal where idanimal = " .  substr( $_POST["id1"],5));

while($row = mysqli_fetch_array($result))
  {
  $idanimal 		 =  $row['idanimal'];
  $name 		 =  $row['name'];
  $animalThumbnailPath =  $row['animalThumbnailPath'] ;
  $city     =  $row['city'] ;
  $state    =  $row['state'];
  $zipcode    =  $row['zipcode'] ;
  }
 echo "<div style='float: left;'>";
echo $name ; 
echo "<br><br>";
echo "<img src=" .  $animalThumbnailPath . " alt='Smiley face' width='242' height='242'>";

echo "</div>";
?>
<div style='float: right'>
<br><br>
<table style="width:300px">

<tr><td>Name : </td><td><?php echo $name ?></td> </tr>
<tr><td>City : </td><td><?php echo $city ?></td></tr>
<tr><td>State : </td><td><?php echo $state ?></td></tr>
<tr><td>Zipcode : </td><td><?php echo $zipcode ?></td></tr>

</table>
</div>
</body>
</html>