<html>

<head>
    <title>Monro-West-Monroe C&VB</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css'>
    <link rel="stylesheet" href="css/index.css" />
    <script src="https://maps.google.com/maps/api/js?v=3.9&libraries=places&amp;sensor=false"></script>
    <script src="js/oms.min.js"></script>
    <script>
        window.onload = function() {

            // Initialize variables
            var encodedString, address, marker, markerCluster, x;
            var stringArray, markers = [];
            var clusterClicked = false;
            var gm = google.maps;
            var summaryPanel = document.getElementById('Output');
            summaryPanel.innerHTML = '';

            /******** Initialize Map **********/
            var map = new gm.Map(document.getElementById('map_canvas'), {
                zoom: 4,
                center: {
                    lat: 39.81528751808606,
                    lng: -99.5625000167638
                }
            });
            /*********************************/

            // Initialize variables
            var geocoder = new gm.Geocoder();
            var iw = new gm.InfoWindow();
            var oms = new OverlappingMarkerSpiderfier(map, {
                markersWontMove: true,
                markersWontHide: true
            });

            var shadow = new gm.MarkerImage(
                new gm.Size(37, 34),
                new gm.Point(0, 0),
                // anchor - where to meet map location
                new gm.Point(10, 34)
            );


            /****** Set the Infowindow of marker **********/
            oms.addListener('click', function(marker) {
                iw.setContent(marker.desc);
                iw.open(map, marker);
            });

            /*************** Show multiple marker of same place**********/

            oms.addListener('spiderfy', function(markers) {
                for (var i = 0; i < markers.length; i++) {
                    markers[i].setIcon('images/iconRed.png');
                    markers[i].setShadow(null);
                }
                iw.close();
            });

            /********** Closed Multiple marker of same place *******/
            oms.addListener('unspiderfy', function(markers) {
                for (var i = 0; i < markers.length; i++) {
                    markers[i].setIcon("images/default.png");
                    markers[i].setShadow(shadow);
                }
            });


            /******* Mark pin on Map form the values of database *************/

            var bounds = new gm.LatLngBounds();
            encodedString = document.getElementById("encodedString").value;
            stringArray = encodedString.split("END");
            for (x = 0; x < stringArray.length; x = x + 1) {
                var addressDetails = [];
                addressDetails = stringArray[x].split("ZIPCODE");
                setMarker(map, addressDetails);
            }

            function setMarker(map, addressDetails) {
                var lat = new gm.LatLng(addressDetails[1], addressDetails[2]);
                bounds.extend(lat);
                var marker = new gm.Marker({
                    map: map,
                    position: lat,
                    content: addressDetails[0]
                });
                marker.desc = addressDetails[0];
                oms.addMarker(marker);
                markers.push(marker);
            }

            /********* MarkerClusterer to show the no of visitor from that place *******/
            var mcOptions = {
                gridSize: 50,
                maxZoom: 15,
                imagePath: 'images/m'
            };

            markerCluster = new MarkerClusterer(map, markers, mcOptions);
            /******************************************************************************/



            /********************* Pin Mark on map form the Pin Mark Button*******************************/
            document.getElementById('markerSubmit').addEventListener('click', function() {
                clearMarkers(null);
                markerCluster.clearMarkers(null);
                geocodeAddress(geocoder);
                $('#address').val('');
            });

            function geocodeAddress(geocoder) {
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
                       var marker = new google.maps.Marker({
                            map: map,
                            position: results[0].geometry.location,
                            content: results[0].formatted_address,
                            icon: 'images/iconMarker.png'
                        });
                        summaryPanel.innerHTML = "Your address was marked in map. If it is not correct click the marker that you pin to unmark it";
                        marker.desc = results[0].formatted_address;
                oms.addMarker(marker);
                 markers.push(marker);
                timerMessage();
                    } else {
                        summaryPanel.innerHTML = 'Address is not available form that pale to pin on map';
                        timerMessage();
                    }
                });

            }
            /******************************* Zoom In and Zoom Out*********************************/
            // Setup the click event listener - zoomIn
            gm.event.addDomListener(document.getElementById('zoomIn'), 'click', function() {
                map.setZoom(map.getZoom() + 1);
            });

            // Setup the click event listener - zoomOut
            gm.event.addDomListener(document.getElementById('zoomOut'), 'click', function() {
                map.setZoom(map.getZoom() - 1);
            });

            /********************************************************************************/
            document.getElementById('submit').addEventListener('click', function() {
                window.location.href = "Registration.php?" + address;
                //  window.location.href = "Registration.php?" + document.getElementById('address').value;
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
            /*************************** End Map Location Search box **********************/

            /****************** Timer to display message for only 5 sec *******************/
            function timerMessage() {
                setTimeout(function() {
                    document.getElementById('Output').innerHTML = '';
                }, 5000);

            }




            /***********************************************************************************************
                                       Mark on the Map
             ***********************************************************************************************/
            function getReverseGeocodingData(latlng) {
               // summaryPanel.innerHTML = "";
                geocoder = new gm.Geocoder();
                geocoder.geocode({
                    'latLng': latlng
                }, function(results, status) {
                    if (status !== gm.GeocoderStatus.OK) {

                        summaryPanel.innerHTML = "Address is not available form that pale to pin on map";
                        timerMessage();
                    }
                    // This is checking to see if the Geoeode Status is OK before proceeding
                    if (status == gm.GeocoderStatus.OK) {
                        console.log(results);
                        address = (results[0].formatted_address);
                        placeMarker(latlng, address);
                    }
                });
            }

            function placeMarker(location, address) {
              var  marker = new gm.Marker({
                    position: location,
                    map: map,
                    content: address,
                    icon: 'images/iconMarker.png'
                });
                summaryPanel.innerHTML = "Your address was successfully marked on map. If it is not correct, then mark on correct address ";
                marker.desc = address;
                oms.addMarker(marker);
                 markers.push(marker);
                 timerMessage();

            }
            /*******************************************************************************/

            /******************* Pin Marker on Map only when it is not clicked on Cluster ***/
            gm.event.addListener(map, 'click', function(event) {
                // setTimeout to relay the map click event to be the last thing javascript should execute
                setTimeout(function() {
                    if (!clusterClicked) {
                        // remove all the marker
                        clearMarkers(null);
                        // remove all the MarkerCluster
                        markerCluster.clearMarkers(null);
                        // call the function to pin on map
                        getReverseGeocodingData(event.latLng);
                        clusterClicked = false;

                    } else {
                        clusterClicked = false;
                    }
                }, 0);
            });

            /******************** Clear all marker from Map ********************************/
            function clearMarkers(map) {
                for (var i = 0; i < markers.length; i++) {
                    markers[i].setMap(map);
                }
            }

            /**************************************************************************************
                 Click event for MarkerCluster. If click on MarkerCluster then it will zoom on
                            Markercluster insted of mark on Map
             **************************************************************************************/
            gm.event.addListener(markerCluster, "clusterclick", function() {
                clusterClicked = true;
            });

            //  map.fitBounds(bounds);
        };
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
    <h1 align="center">Welcome to Monroe West-Monroe Convention and Vistor Bureau </h1>
    <script src="js/markerclusterer.js"></script>
    <div id="map_canvas"></div>
    <div id="Output"></div>
    <div class="form-group">
        <label class="col-md-4 control-label"></label>
        <div class="col-md-4">
            <div id="floating-pane1">
                <input id="address" class="textbox" placeholder="Provide Your Location" value="">
                <button id="markerSubmit" class="btn btn-info btn-lg" type="button"> <span class="glyphicon glyphicon-pushpin"></span> Pin Mark </button>

            </div>
            <div id="floating-pane2">
                <button id="submit" type="submit" class="btn btn-warning btn-lg">Registratio Button</button>
            </div>
            <div id="floating-pane3">
                <a href="admin.php" class="btn btn-info" role="button">Admin Login</a>
            </div>
            <div id="floating-pane4">
                <button class="btn btn-info btn-lg" id="zoomIn">
                    <span class="glyphicon glyphicon-zoom-in"></span> Zoom In
                </button>
            </div>
            <div id="floating-pane5">

                <button class="btn btn-info btn-lg" id="zoomOut">
                    <span class="glyphicon glyphicon-zoom-out"></span> Zoom Out
                </button>
            </div>

        </div>
    </div>
</body>

</html>