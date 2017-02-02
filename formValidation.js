function FormValidation() {
  var fieldValue = document.getElementById("firstName").value;
  if (fieldValue == "" || fieldValue == null) {
    alert('Please Enter First Name');
    document.getElementById("firstName").style.borderColor = "red";
    return false;
  }

  var fieldCity = document.getElementById("cityName").value;
  if (fieldCity == "" || fieldCity == null) {
    alert('Please Enter City Name');
    document.getElementById('cityName').style.borderColor = "red";
    return false;
  }

  var fieldZipCode = document.getElementById("zipCode").value;
  var passReg = /^\d{5}(-\d{4})?$/;
  if (!fieldZipCode == "") {
    if (!passReg.test(fieldZipCode)) {
      alert("Please Enter the Valid Zipcode");
      document.getElementById("zipCode").style.borderColor = "red";
      return false;
    }

  }


  var fieldNoInParty = document.getElementById("noInParty").value;
  if (isNaN(fieldNoInParty) || fieldNoInParty > 50 || fieldNoInParty < 1) {
    alert('Please Enter the Numeric Value\n\t In No. in Party');
    document.getElementById("noInParty").style.borderColor = "red";
    return false;
  }

}
