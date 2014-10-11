$(document).ready(function(){

	$("#events").click(function(){
		  $("#content").load('ajax/sheduledEvents.html');
		 });
	
	  $("#hdrTeam,#menuTeam").click(function(){
		  $.post('ajax/teaminfo.php',{x:1},function(data){
		  $("#content").html(data);  
		 });
		 });


 $("#hdrAdmin,#menuAdmin").click(function(){
    $.post('ajax/admin.html',{x:1},function(data){
   $("#content").html(data);
 });
  });
 
 
   $("#hdrCode,#menuCode").click(function(){
    $.post('ajax/teams.php',{x:1},function(data){
   $("#content").html(data);
 });
 
  });
   $("#hdrCss,#menuCss").click(function(){
		$.post('ajax/players.php',{x:1},function(data){
	    $("#content").html(data); 
   });
   });
});
function runMyFunction(clicked_id)
{
$.post('ajax/playerInfo.php',{id:clicked_id},function(data){
	    $("#content").html(data); 
});
}
function runMyTeamFunction(clicked_id)
{
$.post('ajax/teamsInfo.php',{id1:clicked_id},function(data){
	    $("#content").html(data); 
});
}
