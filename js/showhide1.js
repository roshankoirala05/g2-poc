$(document).ready(function(){
	
	// remove the href from only anchors also shows the cursor pointer
	 $("a").removeAttr("href").css("cursor","pointer");
            var query = window.location.search.substring(1);
            
       if(query=="setuppassword")
       {
       	$("#login").slideUp("slow", function(){
		  $("#Create").slideDown("slow"); 
	   });	
       }
      /* 
      
	 	 // on click set It Hide Login Form and Display Setup Password Form
	 $("#setup").click(function(){
       $("#login").slideUp("slow", function(){
		  $("#Create").slideDown("slow"); 
	   });	
	 });
	 
	 // on click signin It Hide Setup Password form and Display Login Form
     $("#signin").click(function(){
       $("#Create").slideUp("slow",function(){
	      $("#login").slideDown("slow");
	   });
	 });
	 */
	 	 $("#setup").click(function(){
      $('#login').hide('scale', {}, 1000);
		  $('#Create').show('scale', { percent: 100 }, 500);
	 });
	 
	  $("#signin").click(function(){
       $('#Create').hide('scale', {}, 1000);
	     $('#login').show('scale', { percent: 100 }, 500);
	 });
});