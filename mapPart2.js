function placeMarker(location, address) {
    var marker = new google.maps.Marker({
        position: location,
        map: map,
        content: address
    });
    google.maps.event.addListener(marker, "click", function () {
        infowindow.setContent(this.content);
        infowindow.open(map, this);
    });

}

function getReverseGeocodingData(latlng) {
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode({
        'latLng': latlng
    }, function (results, status) {
        if (status !== google.maps.GeocoderStatus.OK) {
            alert(status);
        }
        // This is checking to see if the Geoeode Status is OK before proceeding
        if (status == google.maps.GeocoderStatus.OK) {
            console.log(results);
            var address = (results[0].formatted_address);
            placeMarker(latlng, address);
        }
    });
}

function geocodeAddress(geocoder, resultsMap) {
    var address = document.getElementById('address').value;
    geocoder.geocode({
        'address': address
    }, function (results, status) {
        if (status === google.maps.GeocoderStatus.OK) {
            resultsMap.setCenter(results[0].geometry.location);
            resultsMap.setZoom(10);
            res
        }
        else {
            alert('Geocode was not successful for the following reason: ' + status);
        }
    });

}
