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
<table border="1" align="center" width="70%">
<caption>Players</caption>
<?php
$result = mysqli_query($con,"select * from z1727212.Player");
$x=0;
echo '<tr>';
while($row = mysqli_fetch_array($result))
  {
  	if($x++ == 4){
  		echo '<tr>';
echo '<td>';
echo '<a id="myPid' . $row['idplayer']. '"  onclick="return runMyFunction(this.id);" href="#">';
echo '<img src="'.$row['playerThumbnailPath'].'" alt="Resized JPEG graphic" title="Click to view" /></a> ';
echo '</td>';
echo '</tr>';
$x=0;
  	}
  	else{

echo '<td>';
echo '<a id="myPid' . $row['idplayer']. '" onclick="return runMyFunction(this.id);" href="#">';
echo '<img src="'.$row['playerThumbnailPath'].'" alt="Resized JPEG graphic" title="Click to view" /></a> ';
echo '</td>';

}
}
echo '</tr>';
?>
</table>
</body>
</html>