<html>
  <head>
<script type="text/javascript"
             src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>

<script  type="text/javascript">
$(document).ready(
    function(){
    	 $("#teamsDiv").load('ajax/getTeamSearchPanel.php'); 
	       
    	    $('#teamsID').change(function() {//do something when the user clicks the box
				if(this.checked)
				{
    	        $("#teamsDiv").load('ajax/getTeamSearchPanel.php'); 
    	        $("#teamsDiv").show();
				}else{
			    $("#teamsDiv").hide();
				}
    	    });

    	    $('#playersID').change(function() {//do something when the user clicks the box
    	    	if(this.checked)
    	    	{
    	    	$("#playersDiv").load('ajax/getPlayersSearchPanel.php'); 
    	    	$("#playersDiv").show();
    	    	}
    	    	else
    	    		$("#playersDiv").hide();
    	    });

    	    $('#coachID').change(function() {//do something when the user clicks the box
    	       if(this.checked)
    	       {
    	        $("#coachDiv").load('ajax/getCoachSearchPanel.php'); 
    	        $("#coachDiv").show();
     	       }
     	       else
    	    	   $("#coachDiv").hide();
    	    });

    	    $('#refereeID').change(function() {//do something when the user clicks the box
    	        if(this.checked)
    	        {
    	        $("#refereeDiv").load('ajax/getRefereeSearchPanel.php'); 
    	        $("#refereeDiv").show();
    	        }
    	        else
    	        	  $("#refereeDiv").hide();
    	    });
    	    $('#searchbox').keydown(function() {
    	        $("#teamsDiv").load('ajax/getTeamSearchPanel.php');
    	        if($('#playersID').is(':checked'))
    	    	$("#playersDiv").load('ajax/getPlayersSearchPanel.php'); 
    	        if($('#coachID').is(':checked'))
    	    	  $("#coachDiv").load('ajax/getCoachSearchPanel.php');
    	        if($('#refereeID').is(':checked')) 
    	    	  $("#refereeDiv").load('ajax/getRefereeSearchPanel.php'); 
    	        var searchText = $("#searchbox").val();
                if (searchText.length > 0) {
                    $('tbody td:contains('+searchText+')')
                        .addClass('searchResult');
                    $('.searchResult')
                        .not(':contains('+searchText+')')
                        .removeClass('searchResult');
                    
                    $('tbody tr')
                        .not(':contains('+searchText+')')
                        .addClass('faded');
                    $('.faded:contains('+searchText+')')
                        .removeClass('faded');
                    
                    $('.faded').hide();
                    $('.searchResult').show();
                    
                }
                else if (searchText.length == 0) {
                    $('.searchResult').removeClass('searchResult');
                    $('.faded').removeClass('faded');  
                    $('td').show();
                }
    	    });
    	    $('#searchbox').keyup(
            function(){
                var searchText = $(this).val();
                if (searchText.length > 0) {
                    $('tbody td:contains('+searchText+')')
                        .addClass('searchResult');
                    $('.searchResult')
                        .not(':contains('+searchText+')')
                        .removeClass('searchResult');
                    
                    $('tbody tr')
                        .not(':contains('+searchText+')')
                        .addClass('faded');
                    $('.faded:contains('+searchText+')')
                        .removeClass('faded');
                    
                    $('.faded').hide();
                    $('.searchResult').show();
                    
                }
                else if (searchText.length == 0) {
                    $('.searchResult').removeClass('searchResult');
                    $('.faded').removeClass('faded');  
                    $('td').show();
                }
            });
    	  
    });
</script>
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
<table align="center">
    <thead >
			<tr>
				<td colspan="4"><label for="searchbox">Search:</label> <input
					type="text" id="searchbox" />
					<input type="checkbox" id="teamsID" value="Plant">Plant
					<input type="checkbox" id="playersID" value="Animal">Animal
					
				</td></tr>
		</thead>
</table>

<div align="center" id="teamsDiv"> </div>
<div align="center" id="playersDiv"> </div>
<div align="center" id="coachDiv"> </div>
<div align="center" id="refereeDiv"> </div>
   </body>
   
</html>