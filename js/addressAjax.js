/* Ajax function that display the greeting message after visitor pin his/her location */
/* It post value without reloading the page */
function myFunction() {
 var city = $("#cityName").val();
 var state = $("#stateName").val();
 var country = $("#countryName").val();
 $.ajax({
  type: "GET",
  dataType: "json",
  url: "addressAjax.php",
  data: {
   'city': city,
   'state': state,
   'country': country
  },
  success: function (data) {
   /* If country is US */
   if (data["Country"] === "US") {
    /* If count is less than and equal to 3 */
    if (data['number'] <= 3) {
     if (data['number'] == 1) {
      wellcome = "You are the " + "1st" + " visitor from<br>" + data["City"] + ", " + data["State"] + ", " + data["Country"];
     }
     else if (data['number'] == 2) {
      wellcome = "You are the " + "2nd" + " visitor from<br>" + data["City"] + ", " + data["State"] + ", " + data["Country"];
     }
     else {
      wellcome = "You are the " + "3rd" + " visitor from<br>" + data["City"] + ", " + data["State"] + ", " + data["Country"];
     }

    }
    else {
     wellcome = "You are the " + data['number'] + "th visitor from<br>" + data["City"] + ", " + data["State"] + ", " + data["Country"];

    }
    /* To display value with formatted greeting in the div well in mapAndForm.php */
    document.getElementById("well").innerHTML = wellcome;
   }
   /* If country is other than US */
   else {
    if (data['number'] <= 3) {
     if (data['number'] == 1) {
      wellcome = "You are the " + "1st" + " visitor from<br>" + data["Country"];
     }
     else if (data['number'] == 2) {
      wellcome = "You are the " + "2nd" + " visitor from<br>" + data["Country"];
     }
     else {
      wellcome = "You are the " + "3rd" + " visitor from<br>" + data["Country"];
     }
    }
    else {
     wellcome = "You are the " + data["number"] + " visitor from<br>" + data["Country"];

    }
    document.getElementById("well").innerHTML = wellcome;
   }
  },
  error: function (xhr, ajaxOptions, thrownError) {
   alert(xhr.responseText);
  }
 });
}
