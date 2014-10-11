<?php 
/*
 Z ID    : Z1727212		NAME     : AMANULLA SHAIK
ASSIGN  : 8             DUE DATE : Mar 4
COURSE  : CSCI 566      SECTION  : 3
*/

/*
 * Returns a list of last names of the people who work in that office for the input last name.
* */
$con=mysqli_connect("students","z1727212","19890120","classicmodels");


echo "<table border='1'>
<tr>
<th>LastName</th>
</tr>";

$quer1= "select lastName from Employees,Offices where Employees.officeCode=Offices.officeCode and city LIKE '%".$_POST[value]."'";

$result = mysqli_query($con,$quer1);

while($row = mysqli_fetch_array($result))
{
	echo "<tr>";
	echo "<td>" . $row['lastName'] . "</td>";
	echo "</tr>";
}
echo "</table>";
?>