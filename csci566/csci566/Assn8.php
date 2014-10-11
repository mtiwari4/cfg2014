<!--
Z ID    : Z1727212		NAME     : AMANULLA SHAIK
ASSIGN  : 8             DUE DATE : Mar 4
COURSE  : CSCI 566      SECTION  : 2
This program displays percentage and grade for user entered values.
-->

<!DOCTYPE html>
<html>
<head>
<?php
// define variables and set to empty values used for error global access and error constants
$percent=$grade=$assignmentPoints=$assingmentScore=$testPoints=$testScore="";
$assignPointsErr=$assinScoreErr=$testPointsErr =$testScoreErr="";

// This function calculates percentage
function calculatePercent($apoints,$ascore,$tpoints,$tscore){
	//Assingnment weight = 25%   Test Weight = 75%
	$assignPercent = $GLOBALS['assingmentScore']/$GLOBALS['assignmentPoints']*25;
	$testPercent = $GLOBALS['testScore'] /$GLOBALS['testPoints']*75;
	return ($assignPercent+$testPercent);
}
// This function displays grade corresponding to the percentage scored
function calculateGrade($percent){
	$grade;
	if ($percent >= 95 && $percent <= 100){
		$grade =  "A";
	} else if($percent >= 92 && $percent <= 94.9){
		$grade =  "A-";
	} else if($percent >= 89 && $percent <= 91.9){
		$grade =  "B+";
	} else if($percent >= 86 && $percent <= 88.9){
		$grade =  "B";
	} else if ($percent >= 83 && $percent <= 85.9){
		$grade =  "B-";
	} else if($percent >= 79 && $percent <= 82.9){
		$grade =  "C+";
	} else if($percent >= 75 && $percent <= 78.9){
		$grade =  "C";
	} else if($percent >= 70 && $percent <= 74.9){
		$grade =  "C-";
	} else if($percent >= 68 && $percent <= 69.9){
		$grade =  "D";
	} else {
		$grade =  "F";
	}
	return $grade;
}
//this function validates the user inputs
function validateInputs($assignmentPoints,$assingmentScore,$testPoints,$testScore){
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$isvalid=1;
		if (empty($assignmentPoints))
		{
			$isvalid=0;
			$GLOBALS['assignPointsErr'] = "Total Assignment points is required";
		}
		else
		{
			$GLOBALS['assignmentPoints'] = format_input($assignmentPoints);
		}
			
		if (empty($assingmentScore))
		{
			$isvalid=0;
			$GLOBALS['assinScoreErr'] = "Your Assignment points is required";
		}
		else
		{
			$GLOBALS['assingmentScore'] = format_input($assingmentScore);
		}
			
		if (empty($testPoints))
		{
			$isvalid=0;
			$GLOBALS['testPointsErr'] = "Total Test points is required";
		}
		else
		{
			$GLOBALS['testPoints'] = format_input($testPoints);
		}

		if (empty($testScore))
		{
			$isvalid=0;
			$GLOBALS['testScoreErr'] = "Your Test Score is required";
		}

		else
		{
			$GLOBALS['testScore'] = format_input($testScore);
		}
	}
	return $isvalid;
}
//This function to trim and escapes html characters
function format_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
//This is a wrapper to percentage & grade calculation 
function processForm($assignmentPoints,$assingmentScore,$testPoints,$testScore){
	$GLOBALS['percent'] = calculatePercent($GLOBALS['assignmentPoints'],$GLOBALS['assingmentScore'],$GLOBALS['testPoints'],$GLOBALS['testScore'] );
	$GLOBALS['grade'] = calculateGrade($GLOBALS['percent']);
}
//function for validation
function process()
{
	$isvalid = validateInputs($_POST['assignmentPoints'],$_POST['assingmentScore'],$_POST['testPoints'],$_POST['testScore'] );
	if($isvalid)
		processForm( $GLOBALS['assignmentPoints'],$GLOBALS['assingmentScore'],$GLOBALS['testPoints'],$GLOBALS['testScore'] );

}

if(isset($_POST['submit']))
{
	process();
}
?>
<script
	src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.js"
	type="text/javascript"></script>
<script type="text/javascript"  >

$(document).ready(function(){
//This function is used to clear all text fields upon reset
	$('#MyButton').click(function(){
		 
		 document.getElementById('assnPointsID').value=document.getElementById('assinScoreID').value="";
		 document.getElementById('testPointsID').value="";
		 document.getElementById('testScoreID').value="";
		 document.getElementById('perID').value="";
		 document.getElementById('gradeID').value="";
	      
	    });
    });

</script>
</head>
<body>
	<table align="center">
		<tr>
			<td><b>Z ID</b></td>
			<td> Z1727212</td>
			<td></td>
			<td><b>NAME</b></td>
			<td> AMANULLA SHAIK</td>
		</tr>
		<tr>
			<td> <b>ASSIGN</b></td>
			<td align="center"> 8</td>
			<td></td>
			<td><b>DUE DATE</b></td>
			<td align="center"> MAR 4</td>
		</tr>
		<tr>
			<td><b>CSCI</b></td>
			<td align="center"> 566</td>
			<td></td>
			<td><b>SECTION</b> </td>
			<td align="center"> 2</td>
		</tr>
	</table>


	<!-- html code to create text fields,buttons along with names -->
	<p>Enter your scores and calculate your percentage so far</p>
	<form name="input" method="post"
		action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

		<fieldset>
			<legend>
				<b>&nbsp;&nbsp;&nbsp;Grade Calculator&nbsp;&nbsp;&nbsp;</b>
			</legend>
			<table>
				<tr>
					<td valign="top"><label> Total assignment points </label></td>
					<td><input type="text" id="assnPointsID" name="assignmentPoints"
						value="<?php echo $assignmentPoints ?>"> <span class="error">* <?php echo $assignPointsErr;?>
					</span>
					</td>
					<td valign="top"><label> Your assignment points</label></td>
					<td><input type="text" id="assinScoreID" name="assingmentScore"
						value="<?php echo $assingmentScore ?>"> <span class="error">* <?php echo $assinScoreErr;?>
					</span>
					</td>

				</tr>
				<tr>
					<td valign="top"><label> Total test/quiz points</label></td>
					<td><input type="text" id="testPointsID" name="testPoints"
						value="<?php echo $testPoints ?>"> <span class="error">* <?php echo $testPointsErr;?>
					</span>
					</td>
					<td valign="top"><label> Your test/quiz points</label></td>
					<td><input type="text" id="testScoreID" name="testScore"
						value="<?php echo $testScore ?>"> <span class="error">* <?php echo $testScoreErr;?>
					</span>
					</td>
				</tr>

				<tr>
					<td valign="top"><label> Your percentage so far </label></td>
					<td><input type="text" id="perID" value="<?php echo $percent ?>"
						name="percentage">
					</td>
					<td valign="top"><label> Your letter grade at this point </label></td>
					<td><input type="text" id="gradeID"value="<?php echo $grade ?>" name="mygrade">
					</td>
				</tr>
				<tr>
					<td colspan="2">&nbsp;&nbsp;</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><input type="submit" name="submit" value="Calculate">
                    <input type="button" id="MyButton" value="Reset" ></td>
				</tr>
			</table>
		</fieldset>
	</form>
	<p>Disclaimer Remember that htis is not your actual score and it can
		change based on future gardes.</p>
</body>
</html>
