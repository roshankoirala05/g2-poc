<!DOCTYPE html>
<html>

<head>
    <title>Monro-West-Monroe C&VB</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">

    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css'>
    <link rel="stylesheet" href="css/index.css" />
    <script>
        function initAutocomplete() {

            //Initialize the Google Maps
            var geocoder = new google.maps.Geocoder();
            var address;
            var marker;
            var markers = [];
            var infowindow = new google.maps.InfoWindow();
            var encodedString;
            var stringArray = [];
            var summaryPanel = document.getElementById('Output');
            summaryPanel.innerHTML = '';

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
                marker = new google.maps.Marker({
                    map: map,
                    position: lat,
                    content: addressDetails[0] // This will show on info window
                });
                google.maps.event.addListener(marker, "click", function() {
                   // map.setZoom(8);
                    //map.setCenter(marker.getPosition());
                    infowindow.setContent(this.content);
                    infowindow.open(map, this);
                });
                markers.push(marker);

            }

            var mcOptions = {
                gridSize: 50,
                maxZoom: 15,
                imagePath: 'images/m'
            };
            var markerCluster = new MarkerClusterer(map, markers, mcOptions);


         /***********************************************************************************************/
            // This function allowed customer to pin on Map
            google.maps.event.addListener(map, 'click', function(event) {
                getReverseGeocodingData(event.latLng);
            });

            function getReverseGeocodingData(latlng) {
                summaryPanel.innerHTML = "";
                geocoder = new google.maps.Geocoder();
                geocoder.geocode({
                    'latLng': latlng
                }, function(results, status) {
                    if (status !== google.maps.GeocoderStatus.OK) {

                        summaryPanel.innerHTML = 'Geocode was not successful for the following reason: ' + status;
                    }
                    // This is checking to see if the Geoeode Status is OK before proceeding
                    if (status == google.maps.GeocoderStatus.OK) {
                        console.log(results);
                         address = (results[0].formatted_address);
                        // window.location.href = "pass.php?name="+address;
                        placeMarker(latlng, address);
                    }
                });
            }

            function placeMarker(location, address) {
                marker = new google.maps.Marker({
                    position: location,
                    map: map,
                    content: address,
                    icon: 'images/iconBlue.png'
                });
                 summaryPanel.innerHTML ="Your address was marked in map. If it is not correct click the marker that you pin to unmark it"
                google.maps.event.addListener(marker, "click", function() {
                  // marker.setMap(null);
                    infowindow.setContent(this.content);
                    infowindow.open(map, this);
                });

            }
        /**********************************************************************************************************/
            /********************* Marker ***************************************/
            document.getElementById('markerSubmit').addEventListener('click', function() {
                geocodeAddress(geocoder, map);
               // $('#address').val('');
                summaryPanel.innerHTML = "";
            });

            function geocodeAddress(geocoder, resultsMap) {
                var address = document.getElementById('address').value;
                geocoder.geocode({
                    'address': address
                }, function(results, status) {
                    if (status === 'OK') {
                         address = (results[0].formatted_address);
                        /*
                        This will load the final position of map
                        */
                        map.setCenter(results[0].geometry.location);
                        marker = new google.maps.Marker({
                            map: map,
                            position: results[0].geometry.location,
                            content: results[0].formatted_address,
                            icon: 'images/iconBlue.png'
                        });
                        google.maps.event.addListener(marker, "click", function() {
                            infowindow.setContent(this.content);
                            infowindow.open(map, this);
                        });
                    } else {
                        summaryPanel.innerHTML = 'Geocode was not successful for the following reason: ' + status;
                    }
                });

            }
        /*************************************************************************************/
        /******************************* Zoom In and Zoom Out*********************************/
            // Setup the click event listener - zoomIn
            google.maps.event.addDomListener(document.getElementById('zoomIn'), 'click', function() {
                map.setZoom(map.getZoom() + 1);
            });

            // Setup the click event listener - zoomOut
            google.maps.event.addDomListener(document.getElementById('zoomOut'), 'click', function() {
                map.setZoom(map.getZoom() - 1);
            });

            /************************** Map Location search Box ******************************/
            // Create the search box and link it to the UI element(address div).
            var input = document.getElementById('address');
            var searchBox = new google.maps.places.SearchBox(input);

            // Bias the SearchBox results towards current map's viewport.
            map.addListener('bounds_changed', function() {
                searchBox.setBounds(map.getBounds());
            });

            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener('places_changed', function() {
                var places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }

                // For each place, get the icon, name and location.
                var bounds = new google.maps.LatLngBounds();
                places.forEach(function(place) {
                    if (!place.geometry) {
                        console.log("Returned place contains no geometry");
                        return;
                    }

                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
            /********************************************************************************/
             document.getElementById('submit').addEventListener('click', function() {
                window.location.href = "Registration.php?" + address;
              //  window.location.href = "Registration.php?" + document.getElementById('address').value;
            });
}
    </script>
</head>

<body>
    <div id='input'>
        <?php
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
         $row[0]." ".$row[1]." ".$row[2]." ".$row[3]." ".$row[4]." ".$row[5]." ".$row[6].
         "ZIPCODE".$row[14]."ZIPCODE".$row[15];;
         $x = $x + 1;
         }
         ?>
            <input type="hidden" id="encodedString" name="encodedString" value="<?php echo $encodedString;?>" />
    </div>
    <h1 align="center">Welcome to Monroe West-Monroe  Convention and Vistor Bureau </h1>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNOpboPQgboMUStdCcaODSa-l0b7UcfUU&libraries=places&callback=initAutocomplete" async defer></script>
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
    <!--script type="text/javascript" src="js/markerclusterer.js"></script-->
    <div id="map_canvas"></div>
    <div id="Output"></div>
    <div class="form-group">
        <label class="col-md-4 control-label"></label>
        <div class="col-md-4">
            <div id="floating-pane1">
                <input id="address" class="textbox" placeholder="Provide Your Location" value="">
                <button id="markerSubmit" class="btn btn-info btn-lg" type="button" > <span class="glyphicon glyphicon-pushpin"></span> Pin Mark </button>

            </div>
             <div id="floating-pane2">
               <button id="submit" type="submit" class="btn btn-warning btn-lg">Registratio Button</button>
            </div>
            <div id="floating-pane3">
                <a href="admin.php" class="btn btn-info" role="button">Admin Login</a>
            </div>
            <div id="floating-pane4">
                   <button class="btn btn-info btn-lg" id = "zoomIn">
                  <span class="glyphicon glyphicon-zoom-in"></span> Zoom In
                  </button>
            </div>
            <div id="floating-pane5">

                 <button class="btn btn-info btn-lg" id = "zoomOut">
                  <span class="glyphicon glyphicon-zoom-out"></span> Zoom Out
                  </button>
            </div>

        </div>
    </div>
</body>

</html>