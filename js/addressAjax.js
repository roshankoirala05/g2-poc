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
   if (data["Country"] === "US") {

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
    document.getElementById("well").innerHTML = wellcome;
   }

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
