<!DOCTYPE html>
<html>

    <head>

        <title>Map</title>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <meta charset="utf-8">
        <script type="text/javascript" src="ExtraMark.js"></script>
        <script type="text/javascript" src="jquery-3.1.1.min.js"></script>

        <link rel="stylesheet" href="Map.css" />
        <script>
            jQuery(document).ready(function ($) {

                //Initialize the Google Maps
                var geocoder;
                var marker;
                var markersArray = [];
                var infos = [];

                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 4,
                    center: {
                        lat: 39.81528751808606,
                        lng: -99.5625000167638
                    }
                });
                var infowindow = new google.maps.InfoWindow();
                var encodedString;
                var stringArray = [];
                var contentString = "";
                encodedString = document.getElementById("encodedString").value;
                stringArray = encodedString.split("****");

                var x;
                for (x = 0; x < stringArray.length; x = x + 1) {
                    var addressDetails = [];

                    //Separate each field
                    addressDetails = stringArray[x].split("&&&");
                    contentString = addressDetails[0];
                    setMarker(map,addressDetails,contentString);
                }
                function setMarker(map, addressDetails,contentString) {
                    alert(contentString);
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
                        else {
                            alert('Geocode was not successful for the following reason: ' + status);
                        }
                    });
                }
            });
        </script>

        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNOpboPQgboMUStdCcaODSa-l0b7UcfUU&callback=initMap"></script>
    </head>

    <body>
        <div id="map"></div>
        <div id='input'> <?php
              //Connect to the MySQL database that is holding your data, replace the x's with your data
           mysql_connect("127.0.0.1", "nawarajsubedi25", "") or die("Could not connect: " . mysql_error());
         mysql_select_db("REGISTRATION");

        //Initialize your first couple variables
     $encodedString = ""; //This is the string that will hold all your location data
         $x= 0; //This is a trigger to keep the string tidy

//Now we do a simple query to the database
    $result = mysql_query("SELECT * FROM `VISITOR`");

//Multiple rows are returned
    while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
    //This is to keep an empty first or last line from forming, when the string is split
    if ($x == 0) {
        $separator = "";
    } else {
        //Each row in the database is separated in the string by four *'s
        $separator = "****";
    }
    //Saving to the String, each variable is separated by three &'s
    $encodedString = $encodedString . $separator .
    $row[0]." ".$row[1]." ".$row[2]." ".$row[3]." ".$row[4]." ".$row[5].
            "&&&".$row[4];
            $x = $x + 1;
}
echo $encodedString;
?>
                <input type="hidden" id="encodedString" name="encodedString" value="<?php echo $encodedString;?>"/>
        </div>
        <div id="map_canvas"></div>
    </body>

</html>
