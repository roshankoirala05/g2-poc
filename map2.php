<!DOCTYPE html>
<html>

<head>

    <title>Map</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <script type="text/javascript" src="ExtraMark.js"></script>
    <script type="text/javascript" src="jquery-3.1.1.min.js"></script>

    <link rel="stylesheet" href="Map.css" />
 <script> function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 5,
                center: {
                    lat: 39.81528751808606,
                    lng: -99.5625000167638
                }
            });
            var geocoder = new google.maps.Geocoder();

            document.getElementById('submit').addEventListener('click', function() {
                geocodeAddres(geocoder, map);
            });
             encodedString = document.getElementById("encodedString").value;
            document.getElementById('submit').addEventListener('click', function() {
                geocodeAddress(geocoder, map);
            });
        }

        function geocodeAddress(geocoder, resultsMap) {
             encodedString = document.getElementById("encodedString").value;
          //  var address = document.getElementById('address').value;
            geocoder.geocode({
                'address': encodedString
            }, function(results, status) {
                if (status === 'OK') {
                    resultsMap.setCenter(results[0].geometry.location);
                    var marker = new google.maps.Marker({
                        map: resultsMap,
                        position: results[0].geometry.location
                    });
                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });
        }
        function geocodeAddres(geocoder, resultsMap) {
  var address = document.getElementById('address').value;
  geocoder.geocode({
    'address': address
  }, function (results, status) {
    if (status === 'OK') {
      resultsMap.setCenter(results[0].geometry.location);
      var marker = new google.maps.Marker({
        map: resultsMap,
        position: results[0].geometry.location
      });
    }
    else {
      alert('Geocode was not successful for the following reason: ' + status);
    }
  });
}
    jQuery(document).ready( function($){
            //Initialize the Google Maps
            var geocoder;
            var map;
            var markersArray = [];
            var infos = [];

            //Load the Map into the map_canvas div

            //Initialize a variable that the auto-size the map to whatever you are plotting
            var bounds = new google.maps.LatLngBounds();
            //Initialize the encoded string
            var encodedString;
            //Initialize the array that will hold the contents of the split string
            var stringArray = [];
            //Get the value of the encoded string from the hidden input
            encodedString = document.getElementById("encodedString").value;
            //Split the encoded string into an array the separates each location
            stringArray = encodedString.split("****");

            var x;
            for (x = 0; x < stringArray.length; x = x + 1)
            {
                var addressDetails = [];
                var marker;
                //Separate each field
                addressDetails = stringArray[x].split("&&&");
                //Load the lat, long data
                var lat = new google.maps.LatLng(addressDetails[1], addressDetails[2]);
                //Create a new marker and info window
                marker = new google.maps.Marker({
                    map: map,
                    position: lat,
                    //Content is what will show up in the info window
                    content: addressDetails[0]
                });
                //Pushing the markers into an array so that it's easier to manage them
                markersArray.push(marker);
                google.maps.event.addListener( marker, 'click', function () {
                    closeInfos();
                    var info = new google.maps.InfoWindow({content: this.content});
                    //On click the map will load the info window
                    info.open(map,this);
                    infos[0]=info;
                });
               //Extends the boundaries of the map to include this new location
               bounds.extend(lat);
            }
            //Takes all the lat, longs in the bounds variable and autosizes the map
            map.fitBounds(bounds);

            //Manages the info windows


    });
    </script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNOpboPQgboMUStdCcaODSa-l0b7UcfUU&callback=initMap"></script>
    </head>
        <body>
    <div id="floating-panel">
        <form>
            <fieldset>
                <legend align="middle">Please Enter</legend>
                <tr>
                    <td>Your Zipcode or City:</td>
                    <td>
                        <input type="Enter Your Zipcode" id="address" value="" class="inputBox" />
                        <input id="submit" type="button" value="Send" class="submitButton" />
                    </td>
                </tr>
            </fieldset>
        </form>
    </div>
    <div id="map"></div>
    <div id='input'>
        <?php
        include 'DatabaseConnection.php';
        $encodedString="";

        $raj= new DatabaseConnection();

   $query = "SELECT Zipcode FROM VISITOR";
   $result= $raj->returnQuery($query);
   if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc())
    {
      $encodedString= $row[Zipcode];
    }
 }
?>
        <input type="hidden" id="encodedString" name="encodedString" value="<?php echo $encodedString; ?>" />
    </div>
    <div id="map_canvas"></div>
    </body>

</html>