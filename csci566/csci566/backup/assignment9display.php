<!--Name : Vama Sivananda Reddy Talapula
zid : z1727588
SECTION 566-2
Assignment : 9
due date : April-11-2014  -->
<!--INCLUDING THE FETCH DATA FUNCTIONS INTO THIS PROGRAM-->
<?php
 include_once 'assignment9fetchdata.php';
 connect();
 ?>
 
 <!--HTML FOR DISPLAYING DATA-->
 <!doctype html>
 <html>
<head>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

<script type="text/javascript">
function fn1()
{
 var elSel = document.getElementById('Employees');
  var i;
  for (i = elSel.length - 1; i>=0; i--) {
    if (elSel.options[i].selected) {
    var value =elSel.options[i].value;
    }
  }
  $("#content").load("../backup/assignment9fetchdata1.php",{value:value});
}
	 
	
</script>
</head>
 <body>
 <header>
 <h1 align = "center">Name : Vama sivananda reddy talapula, ZId : z1727588, database-566, section 2 </h1>
 </header>
 
 <section>
 <article>
 <hgroup>
 <p align = "center">
 
 <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post"> 
 <p> Select employee's Last name : </p>
 <select name = "Employees" id = "Employees">
 <option value = ""> Select </option>
 <?php dropquery() ?>
 </select>
 </select>
 
 <input type = "submit"  value = "SUBMIT" id="fetchonequery"  onclick='fn1()' >
 </form>
<?php
 if(isset($_POST['fetchonequery']))
 {
 fetchquery();
 }
?>
 <br>

  <p align = "center">
 
 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post"> 
 <p> Select city : </p>
 <select name = "city">
 <option value = ""> Select </option>
 <?php seconddropquery(); ?>
 </select>
 </select>
 
 <input type = "submit"  value = "SUBMIT" id = "fetchtwoquery">
 </form>
 
<?php
 if(isset($_POST['fetchtwoquery']))
 {
 secondfetchquery();
 }
?>
 <div id ="content"></div>
 
 </article>
 </section>
 </body>
 </html>