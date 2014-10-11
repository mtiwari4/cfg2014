<!-- 
Z ID    : Z1727212		NAME     : AMANULLA SHAIK
ASSIGN  : 8             DUE DATE : Mar 4
COURSE  : CSCI 566      SECTION  : 3
This program displays employee last names drop down from database.
 -->
<html>
<head>

<script type="text/javascript">

function myFunction()
{
 var elSel = document.getElementById('element');
  var i;
  for (i = elSel.length - 1; i>=0; i--) {
    if (elSel.options[i].selected) {
    var value =elSel.options[i].value;
    }
  }
  $("#loadHere1").load("../db/getData.php",{value:value});
}
</script>
</head>
<body>
<label>Last Name</label>
<select name='element' id='element'>

<option value="select">select</option>
<?php

$con=mysqli_connect("students","z1727212","19890120","classicmodels");

$result = mysqli_query($con,"select * from classicmodels.Employees");


while($row = mysqli_fetch_array($result))
{

	echo '<option value="'.$row['lastName'].'"';
	echo '>'. $row['lastName'] . '</option>'."\n";

}
?>
</select>
<button type='button' onclick='myFunction()' name='submit'>Fetch Details!</button> 
<div id='loadHere1'></div>

</body>
</html>