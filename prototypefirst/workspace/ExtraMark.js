function geocodeAddres(geocoder, resultsMap) {
  //  var address = document.getElementById('Nepal').value;
  // From here program didn't execute//
  var address = $.post("MarkerQuery.php", {
    zip_code: geocoder
  });
  alert(address);
  /////////////////////////////////////////////////////////////////
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
