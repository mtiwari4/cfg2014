<html>
  <head>
  <style type="text/css">

td {
    border: 1px solid #000;
    padding: 0.4em 1em;
    background-color: #fff;
}

td.searchResult {
    background-color: #ffa;
}
td.faded {
    opacity: 0.2;
}
</style>
</head>
   <body>
<table>

 <thead>
			<tr>
				<td colspan="7" align="center"><label > Matches</label>
				</td>
				
			<tr>
				<td><label >City</label></td>
				<td><label >Date</label></td>
				<td><label >Home Team</label></td>
				<td><label >Score</label></td>
				<td><label >Away Team</label></td>
				<td><label >Score</label></td>
				<td><label >Winning Team</label></td>
			</tr>
		</thead>
    <tbody>
			
			<?php
			$con=mysqli_connect("students","z1727212","19890120","z1727212");
			$ts= $_POST[time];
			// Check connection
			if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			$teams = Array();
			if($ts == "default")
			$query = "select * from z1727212.Game";
			else if($ts == "current")
			$query = "select * from z1727212.Game where date LIKE '%".  date('Y-m-d')."%'";
			else if($ts == "past"){
				$query = "select * from z1727212.Game where date <'".  date('Y-m-d')."'";
			}
				else if($ts == "scheduled")
					$query = "select * from z1727212.Game where date >".  date('Y-m-d');
			$result = mysqli_query($con,"select Team_ID,TeamName from z1727212.Team");
			while($row = mysqli_fetch_array($result)) {
				$teams[$row['Team_ID']] = $row['TeamName'];
			}
			//$sql1 = "select TeamName  from z1727212.Team AS T, z1727212.Game AS G where  G.homeTeamID = T.Team_ID";
			//$sql2 = "select TeamName  from z1727212.Team AS T, z1727212.Game AS G where  G.awayTeamID = T.Team_ID";
			//$sql = "select place,date,,homeScore,TeamName,awayScore,TeamName from z1727212.Team AS T, z1727212.Game AS G where  G.homeTeamID = T.Team_ID";
			//$sql = "select homeTeamID,TeamName from z1727212.Team AS A,z1727212.Game AS B where B.homeTeamID = A.Team_ID ";
			$result = mysqli_query($con,$query);
			while($row = mysqli_fetch_array($result)) {
			echo "<tr>";
				echo "<td>" . $row['place'] . "</td>"; 
				echo "<td>" . $row['date'] . "</td>";
				echo "<td>" . $teams[$row['homeTeamID']] . "</td>"; 
				echo "<td>" . $row['homeScore'] . "</td>";
				echo "<td>" . $teams[$row['awayTeamID']] . "</td>";
				echo "<td>" . $row['awayScore'] . "</td>";
				echo "<td>" . $teams[$row['winningTeamID']] . "</td>";
				echo "</tr>";
			}
			
?>
    </tbody>
    
</table>
</body>
</html>