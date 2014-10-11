<html>
  <head>
</head>
<body>

<div id="addPlayer" style="background-color:#EEEEEE;float:left;width:60%;">

<form name="addPlayerInput" action="ajax/insertPlayer.php" method="post">
 First name: <input type="text" name="fname"><br>
  Last name: <input type="text" name="lname"><br>
Weight: <input type="text" name="weight"><br>
Height: <input type="text" name="height"><br>
Job Type<select>
  <option value="amature">Amature</option>
  <option value="professional">Professional</option>
</select><br>
Team<select>
  <option value="aman">Aman</option>
  <option value="professional">Professional</option>
</select><br>
<input type="submit" value="Submit" >
</form>

 
  </div>

</body>
</html>