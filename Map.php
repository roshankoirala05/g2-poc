<!DOCTYPE html>
<html>

<head>

    <title>Map</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <script type="text/javascript" src="ExtraMark.js"></script>
    <script type="text/javascript" src="jquery-3.1.1.min.js"></script>

    <link rel="stylesheet" href="Map.css" />
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
    <script>
        function initMap() {
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

            document.getElementById('submit').addEventListener('click', function() {
                geocodeAddress(geocoder, map);
            });
        }

        function geocodeAddress(geocoder, resultsMap) {
            var address = document.getElementById('address').value;
            geocoder.geocode({
                'address': address
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
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNOpboPQgboMUStdCcaODSa-l0b7UcfUU&callback=initMap">
    </script>
</body>

</html>