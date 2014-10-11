$(document).ready(function(){
  $("#hdrTeam,#menuTeam").click(function(){
  
	   $("#content").hide(); 
  $("#admin").hide(); 
 $("#css").hide();
 $("#code").hide();
 $("#info").show();
  });
 $("#hdrAdmin,#menuAdmin").click(function(){
   
 $("#content").hide(); 
 $("#css").hide();
 $("#code").hide();
 $("#info").hide();
 $("#admin").show();
  });
   $("#hdrCss,#menuCss").click(function(){
   
 $("#content").hide(); 
 $("#code").hide();
 $("#info").hide();
 $("#admin").hide();
 $("#css").show();
  });
   $("#hdrCode,#menuCode").click(function(){
   
 $("#content").hide(); 
 $("#css").hide();
 $("#info").hide();
 $("#admin").hide();
 $("#code").show();
  });

});