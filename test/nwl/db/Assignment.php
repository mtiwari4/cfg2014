
   
   <!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" /> 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/jquery-ui.min.js"></script>

<script type="text/javascript">
$(function() {
	 $("#SearchbyName").click(function(){
		    $("#loadHere").load('../db/getData.php'); 
		 });
		    $("#SearchbyCity").click(function(){
			$("#loadHere1").load('../db/getData1.php'); 
		 });
});
	function myFunction()
	{
	 var elSel = document.getElementById('element');
	  var i;
	  for (i = elSel.length - 1; i>=0; i--) {
	    if (elSel.options[i].selected) {
	    var value =elSel.options[i].value;
	    }
	  }
	 $("#loadHere").load("../db/getData.php",{value:value});
     
	}
	function getLastname(){
		 var elSel = document.getElementById('element1');
		  var i;
		  for (i = elSel.length - 1; i>=0; i--) {
		    if (elSel.options[i].selected) {
		    var value =elSel.options[i].value;
		    }
		  }
		 $("#loadHere1").load("../db/getData1.php",{value:value});
	  
		}
	
</script>
</head>
<body>
 <div id="container" style="width:100%;" class="main">
 <a id="SearchbyName" href="#">Search by LastName</a>  
  <a id="SearchbyCity" href="#">Search by City</a>
  </div>
   
   <form id="getEmployees" name="getEmployees" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
   





   </form>
<div id='loadHere'></div>
<div id='loadHere1'></div>
   
   </body>
</html>
  