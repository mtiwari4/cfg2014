<html>
<head>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script src="jquery.blockUI.js" ></script>
<script type="text/javascript" src="js/jquery.form.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
	
		var options = {
			target : '#playerDiv', // target element(s) to be updated with server response 

		};
		$('#addPlayerInput').submit(function() {
			$(this).ajaxSubmit(options);
			// always return false to prevent standard browser submit and page navigation 
			return false;
		});
	});
</script>
<?php
// define variables and set to empty values
$fnameErr = $lnameErr = $emailErr = $weightErr = $heightErr = $phoneErr = "";
$fname = $lname = $email = $weight = $height = $phone = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$isvalid=true;
   if (empty($_POST["fname"])){
   	$isvalid=false;
     $fnameErr = "First Name is required";}
   else
     {
     $fname = test_input($_POST["fname"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$fname))
       {
       	$isvalid=false;
       $fnameErr = "Only letters and white space allowed";
       }
     }
  
 if (empty($_POST["lname"])){
 	$isvalid=false;
 	$lnameErr = "Last Name is required";}
   else
     {
     $lname = test_input($_POST["lname"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$lname))
       {
       	$isvalid=false;
       $lnameErr = "Only letters and white space allowed";
       }
     }

   if (empty($_POST["email"])){
   	$isvalid=false;
     $emailErr = "Email is required";}
   else
     {
     $email = test_input($_POST["email"]);
     // check if e-mail address syntax is valid
     if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
       {
       	$isvalid=false;
       $emailErr = "Invalid email format";
       }
     }
     if (empty($_POST["height"]))
      {
      	$isvalid=false;
      	$heightErr = "Height is required";}
   else
     {
     $height = test_input($_POST["height"]);
     // check if weight syntax is valid => Matches  
   /*   if (!preg_match("([0-9]+\.[0-9]*)|([0-9]*\.[0-9]+)|([0-9]+)",$height))
       {
       	$isvalid=false;
       $heightErr = "Invalid weight format";
       } */
     }

   if (empty($_POST["weight"]))
      {$isvalid=false;$weightErr = "Weight is required";}
   else
     {
     $weight = test_input($_POST["weight"]);
     // check if weight syntax is valid => Matches  9999999 | 99999.99999 | 99,999,999.9999
    /*  if (!preg_match("([0-9]+\.[0-9]*)|([0-9]*\.[0-9]+)|([0-9]+)",$weight))
       {
       	$isvalid=false;
       $weightErr = "Invalid weight format";
       } */
     }

   if (empty($_POST["phone"]))
     {$isvalid=false;
     $phoneErr = "phone is required";}
   else
     {
	$phone = test_input($_POST["phone"]);
	 // check if phone syntax is valid ==> Matches 	(658)154-1122 | 6581541122 | 658-154-1122
     /* if (!preg_match("^\(\d{3}\) ?\d{3}( |-)?\d{4}|^\d{3}( |-)?\d{3}( |-)?\d{4}",$phone))
       {
       	$isvalid=false;
       $phoneErr = "Invalid phone format";
       } */
	}
if($isvalid)
	insert();
}

function test_input($data)
{
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
}

function insert(){
	$con=mysqli_connect("localhost","root","root","basketball");

	// Check connection
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	//INSERT INTO basketball.team VALUES (null,'NIUSpartans','Dekalb','IL','Head_Coach','CoachName','IL','USA')

	$sql="INSERT INTO basketball.player VALUES(null,'$_POST[fname]','$_POST[lname]','$_POST[weight]','$_POST[height]','$_POST[playerTeam]',null,null,'$_POST[playerPositionID]',null,null,null,'$_POST[phone]')";

	if (!mysqli_query($con,$sql))
	{
		die('Error: ' . mysqli_error($con));
	}
	die( "<div align='center'>Player Added Successfully!!");

	mysqli_close($con);
}
?>
</head>
<body>
	<div id="playerDiv">
		<form id="addPlayerInput"  method="post" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
			First name: <input type="text" name="fname" value="<?php echo $fname;?>">
			 <span class="error">* <?php echo $fnameErr;?></span><br> 
			Last name: <input type="text" name="lname" value="<?php echo $lname;?>">
 			<span class="error">* <?php echo $lnameErr;?></span><br> 
			 E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  			 <span class="error">* <?php echo $emailErr;?></span> <br><br>
			Weight: <input type="text" name="weight" value="<?php echo $weight;?>">
			<span class="error">* <?php echo $weightErr;?></span><br> 
			Height: <input type="text" name="height" value="<?php echo $height;?>">
			<span class="error">* <?php echo $heightErr;?></span><br> 
			Position<select name="playerPositionID">
				<option value="1">Point Gaurd</option>
				<option value="2">Shooting Gaurd</option>
				<option value="3">Small Forward</option>
				<option value="4">Power Forward</option>
				<option value="5">Center</option>
			</select><br> 	
			Phone: <input type="text" name="phone" value="<?php echo $phone;?>">
			<span class="error">* <?php echo $phoneErr;?></span><br> 
			Team<select name="playerTeam">
				<option value="aman">Aman</option>
				<option value="professional">Professional</option>
			</select><br>
			  <input type='hidden' name='submit' /> 
			 <input type="submit" id="playerSubmit">
			<div id="output"></div>
		</form>
	</div>
</body>
</html>