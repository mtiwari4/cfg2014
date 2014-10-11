
   <?php
// Create connection
$con=mysqli_connect("students","z1727212","19890120","z1727212");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$sql = "select homeTeamID,TeamName from z1727212.Team AS A,z1727212.Game AS B where B.homeTeamID = A.Team_ID ";
$result = mysqli_query($con,$sql);
$rows = array();
while($row = mysqli_fetch_array($result))
  {
  $rows[$row[1]] = $row[0];
  
  }
echo json_encode($rows);
?>
