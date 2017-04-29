$(document).ready(function(){
      
      /****** Remove href tag from browser ******/
      $("a").removeAttr("href");
      
      
      
      /** Show nameAndEmail div and hide questionAsk div after clicking the questiondiv id  */
	 /** After clicking the yes id it will hide thankyou div, map div and show questionAsk div  
	 jQuery('#yes').on('click', function(event) {   
         jQuery('#threeQuestions').toggle('show');
         jQuery('#mapandinfo').toggle('hide');
          
    });
	
	 jQuery('#linkToNameAndEmail').on('click', function(event) {   
         jQuery('#nameAndEmail').toggle('show');
         jQuery('#threeQuestions').toggle('hide');
    });
  */
     
   
   // First transition
    $('#next').click(function(){
          $('#introtext').hide();
       $('#addresstext').hide();
    $('#greetingtext').show('drop', { direction: 'right' }, 500);
    
    });
    
    
    //Second Transition
     $('#yes').click(function(){
          $('#mapandinfo').hide();
       
    $('#threeQuestions').show('drop', { direction: 'right' },500);
    
    });
    
    
    
    /*** Third Transition */
    $('#linkToNameAndEmail').click(function(){

     $('#threeQuestions').hide();
      $('#nameAndEmail').show('drop', { direction: 'right' },500);
    });
    
    
    
    
    
    
    
});