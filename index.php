<!DOCTYPE html>
<html>

<head>
    <title>Monro-West-Monroe C&VB</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">

    <script type="text/javascript" src="jquery-3.1.1.min.js"></script>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css'>
    <script type="text/javascript" src="mapPart2.js"></script>
    <link rel="stylesheet" href="pinInput.css" />
    <script>
        jQuery(document).ready(function($) {

            //Initialize the Google Maps
            var  geocoder = new google.maps.Geocoder();
            var marker;
            var infowindow = new google.maps.InfoWindow();
            var encodedString;
            var stringArray = [];


            var map = new google.maps.Map(document.getElementById('map_canvas'), {
                zoom: 4,
                center: {
                    lat: 39.81528751808606,
                    lng: -99.5625000167638
                },

            });

            encodedString = document.getElementById("encodedString").value;
            stringArray = encodedString.split("END");

            var x;
            for (x = 0; x < stringArray.length; x = x + 1) {
                var addressDetails = [];
                addressDetails = stringArray[x].split("ZIPCODE");
                setMarker(map, addressDetails);
            }

            function setMarker(map, addressDetails) {
                 var lat = new google.maps.LatLng(addressDetails[1], addressDetails[2]);
                //Create a new marker and info window
                marker = new google.maps.Marker({
                      map: map,
                      position: lat,
                    //Content is what will show up in the info window
                    content: addressDetails[0]
                });
                        google.maps.event.addListener(marker, "click", function() {
                            infowindow.setContent(this.content);
                            infowindow.open(map, this);
                        });
                    }

            google.maps.event.addListener(map, 'click', function(event) {
                getReverseGeocodingData(event.latLng);
            });

            function placeMarker(location, address) {
                marker = new google.maps.Marker({
                    position: location,
                    map: map,
                    content: address
                });
                google.maps.event.addListener(marker, "click", function() {
                    infowindow.setContent(this.content);
                    infowindow.open(map, this);
                });

            }

            function getReverseGeocodingData(latlng) {
                geocoder = new google.maps.Geocoder();
                geocoder.geocode({
                    'latLng': latlng
                }, function(results, status) {
                    if (status !== google.maps.GeocoderStatus.OK) {
                        alert(status);
                    }
                    // This is checking to see if the Geoeode Status is OK before proceeding
                    if (status == google.maps.GeocoderStatus.OK) {
                        console.log(results);
                        var address = (results[0].formatted_address);
                     // window.location.href = "pass.php?name="+address;
                  // alert(latlng);
                  // alert(latlng.lat());
                        placeMarker(latlng, address);
                    }
                });
            }
            /********************* Address ***************************************/
            document.getElementById('addressSubmit').addEventListener('click', function() {

                addressLocation(geocoder, map);
            });

            function addressLocation(geocoder, resultsMap) {
                var address = document.getElementById('address').value;
                geocoder.geocode({
                    'address': address
                }, function(results, status) {
                    if (status === google.maps.GeocoderStatus.OK) {
                        resultsMap.setCenter(results[0].geometry.location);
                        resultsMap.setZoom(9);
                    } else {
                        alert('Geocode was not successful for the following reason: ' + status);
                    }
                });

            }
    /********************************************************************************/
     /********************* Marker ***************************************/
            document.getElementById('markerSubmit').addEventListener('click', function() {
                geocodeAddress(geocoder, map);
                $('#marker').val('');
            });

            function geocodeAddress(geocoder, resultsMap) {
                var address = document.getElementById('marker').value;
                geocoder.geocode({
                    'address': address
                }, function(results, status) {
                   if (status === 'OK') {
                        /*
                        This will load the final position of map
                        */
                     map.setCenter(results[0].geometry.location);
                        marker = new google.maps.Marker({
                            map: map,
                            position: results[0].geometry.location,
                            content: address
                        });
                        google.maps.event.addListener(marker, "click", function() {
                            infowindow.setContent(this.content);
                            infowindow.open(map, this);
                        });
                    } else {
                        alert('Geocode was not successful for the following reason: ' + status);
                    }
                });
            }

    /********************************************************************************/
            // Setup the click event listener - zoomIn
  google.maps.event.addDomListener(document.getElementById('zoomIn'), 'click', function() {
    map.setZoom(map.getZoom() + 1);
  });
  // Setup the click event listener - zoomOut
  google.maps.event.addDomListener(document.getElementById('zoomOut'), 'click', function() {
    map.setZoom(map.getZoom() - 1);
  });
        });

    </script>
</head>

<body>
    <div id='input'>
        <?php
         include 'DatabaseConnection.php';
           $raj= new DatabaseConnection();
         $query = "SELECT * FROM STATELATLONG";
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
         "ZIPCODE".$row[13]."ZIPCODE".$row[14];;
         $x = $x + 1;
         }
           $query = "SELECT * FROM STATECSS";
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
         "ZIPCODE".$row[1]."ZIPCODE".$row[2].
         $x = $x + 1;
         }
         ?>
            <input type="hidden" id="encodedString" name="encodedString" value="<?php echo $encodedString;?>" />
    </div>
    <h1 align="center">Welcome to Monroe West-Monroe  Convention and Vistor Bureau </h1>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNOpboPQgboMUStdCcaODSa-l0b7UcfUU&callback=initMap"></script>
    <div id="map_canvas"></div>
    <div class="form-group">
        <label class="col-md-4 control-label"></label>
        <div class="col-md-4">

            <div id="floating-panel">
                <input id="address" type="textbox" placeholder="Enter Zip or City,State" value="" required autofocus>
                <input id="addressSubmit" type="button" value="Enter">
            </div>
            <div id="floating-pane6">
                <input id="marker" type="textbox" placeholder="Enter Zip or City,State" value="" required autofocus>
                <input id="markerSubmit" type="button" value="Pin Mark">
            </div>
            <div id="floating-pane2">
                <a href="Registration.php" class="btn btn-warning" role="button">Registration Button</a>
            </div>
            <div id="floating-pane3">
                <a href="ADMINPAGE.php" class="btn btn-info" role="button">Admin Login</a>
            </div>
             <div id="floating-pane4">
               <input id="zoomIn" type="button" value="Zoom In">
            </div>
             <div id="floating-pane5">
                <input id="zoomOut" type="button" value="Zoom Out">
            </div>

        </div>
    </div>
</body>

</html>