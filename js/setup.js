function showHint(str) {
    $.ajax({
         type: "GET",
        dataType: "json",
        url: "setup.php", 
        data: {
        	'user': str
        	
        },
        success: function(data) {
           $('#Fname').val(data["Fname"]);
           if( $('#Fname').val() ) 
           {
               /* Add color if ajax fill the Fname */
           $("#Fname").css("background-color","#c4ad2b");
           }
            /* Remove color after value becomes empty */
           else
           {
               $("#Fname").css("background-color","#ffffff");
           }

           $('#Lname').val(data["Lname"]);
           if( $('#Lname').val() ) {
           $("#Lname").css("background-color","#c4ad2b");
           }
           else
           {
               $("#Lname").css("background-color","#ffffff");
           }
           $("#Security").val(data["Security"]);
           if( $('#Security').val() ) 
           {
           $("#Security").css("background-color","#c4ad2b");
           }else
           {
               $("#Security").css("background-color","#ffffff");
           }
        },
         error: function(xhr, ajaxOptions, thrownError) { alert(xhr.responseText); }
        
    });
}