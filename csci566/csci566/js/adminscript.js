$(document).ready(function(){
 
 $("#admindiv").load('html/addPlayer.html'); 
 $("#adminAddPlayer").click(function(){
    $("#admindiv").load('html/addPlayer.html'); 
 });
    $("#adminAddTeam").click(function(){
	$("#admindiv").load('html/addTeam.html'); 
 });
    $("#adminAddCoach").click(function(){
    $("#admindiv").load('html/addCoach.html'); 
 });
   $("#adminScheduleMatch").click(function(){
	   $("#admindiv").load("html/scheduleMatch.html");
 });
   $("#adminAddReferee").click(function(){
	 $("#admindiv").load('html/addReferee.html'); 
 });
   $("#adminAddTeamImg").click(function(){
	 $("#admindiv").load('ajax/addTeamImg.php'); 
 });
  $("#adminAddPlayerImg").click(function(){
	 $("#admindiv").load('ajax/addPlayerImg.php'); 
 });
  $("#adminUpdateScores").click(function(){
		 $("#admindiv").load('html/updateScores.html');
	 });
  $("#addPlayerInput").on('submit', function(e){
    
      e.preventDefault();
    $.post('ajax/insertPlayer.php',{x:1},function(data){
	 $("#admindiv").html(data); 
  });
 });
 
});