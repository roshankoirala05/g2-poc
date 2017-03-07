<!DOCTYPE html>
<html>
   <head>
      <title>Monro-West-Monroe C&VB</title>
      <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
      <meta charset="utf-8">
      <script type="text/javascript" src="ExtraMark.js"></script>
      <script type="text/javascript" src="jquery-3.1.1.min.js"></script>
       <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
        <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css'>
      <link rel="stylesheet" href="initialscreen.css" />
      <script>
         jQuery(document).ready(function ($) {

             //Initialize the Google Maps
             var geocoder;
             var marker;
             var infowindow = new google.maps.InfoWindow();
             var encodedString;
             var stringArray = [];
             var contentString = "";

             var map = new google.maps.Map(document.getElementById('map_canvas'), {
                 zoom: 4,
                 center: {
                     lat: 39.81528751808606,
                     lng: -99.5625000167638
                 }
             });

             encodedString = document.getElementById("encodedString").value;
             stringArray = encodedString.split("END");
             var x;
             for (x = 0; x < stringArray.length; x = x + 1)
             {
                 var addressDetails = [];
                 addressDetails = stringArray[x].split("ZIPCODE");
                 contentString = addressDetails[0];
                 setMarker(map,addressDetails,contentString);
             }

             function setMarker(map, addressDetails,contentString) {
                   geocoder = new google.maps.Geocoder();
                 geocoder.geocode({
                     'address': addressDetails[1]
                 }, function (results, status) {

                     if (status === 'OK') {
                         /*
                         This will load the final position of map
                         */
                         //  map.setCenter(results[0].geometry.location);
                         marker = new google.maps.Marker({
                             map: map,
                             position: results[0].geometry.location,
                             content:contentString
                         });
         google.maps.event.addListener(marker, "click", function () {
             infowindow.setContent(this.content);
             infowindow.open(map, this);
         });
                     }
                     else if (status == google.maps.GeocoderStatus.OVER_QUERY_LIMIT) {
                setTimeout(function () {
                    //Recursively calling spotPosition method for lost addresses
                    setMarker(map,addressDetails,contentString);
                }, 1000);
                     }
                       else {
                         alert('Geocode was not successful for the following reason: ' + status);
                     }
                 });

            }
         });
      </script>
   </head>
   <body>
      <div id='input'> <?php
         include 'DatabaseConnection.php';
           $raj= new DatabaseConnection();
         $query = "SELECT * FROM VISITOR";
         $result= $raj->returnQuery($query);

         $encodedString = "";
         $x= 0;

         while ($row = $result->fetch_array()) {
         if ($x == 0) {
         $separator = "";
         } else {
         $separator = "END";
         }
         $encodedString = $encodedString . $separator .
         $row[0]." ".$row[1]." ".$row[2]." ".$row[3]." ".$row[4]." ".$row[5].
         "ZIPCODE".$row[4];
         $x = $x + 1;
         }
          $query = "SELECT * FROM STATE";
         $result= $raj->returnQuery($query);
         $x= 0;

         while ($row = $result->fetch_array()) {
         if ($x == 0) {
         $separator = "";
         } else {
         $separator = "END";
         }
         $encodedString = $encodedString . $separator .
         $row[0].
         "ZIPCODE".$row[0];
         $x = $x + 1;
         }

         ?>


         <input type="hidden" id="encodedString" name="encodedString" value="<?php echo $encodedString;?>"/>
      </div>
      <h1 align="center">Welcome to Monroe West-Monroe  Convention and Vistor Bureau </h1>
      <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNOpboPQgboMUStdCcaODSa-l0b7UcfUU&callback=initMap"></script>
      <div id="map_canvas"></div>
     <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-4">
       <p><a href="Registration.php" class="btn btn-warning" role="button">Registration Button</a></p>
      <p>  <a href="admin.php" class="btn btn-info" role="button">Admin Login</a></p>
                </div>
                        </div>
            </div>
   </body>
</html>