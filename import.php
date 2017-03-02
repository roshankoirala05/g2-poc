<form name="import" method="post" enctype="multipart/form-data">
     <input type="file" name="file" /><br />
        <input type="submit" name="submit" value="Submit" />
</form>



<?php
 include 'DatabaseConnection.php';
  $raj= new DatabaseConnection();

if(isset($_POST["submit"]))
{
 $file = $_FILES['file']['tmp_name'];
 $handle = fopen($file, "r");
 $c = 0;
 while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
 {
 $name = $filesop[7];

  $url = "https://maps.googleapis.com/maps/api/geocode/json?address='$name,+'USA'&key=AIzaSyCU4yvm6WqECdThPvsg-678iJ0O9lNiJ8E";
        $google_api_response =file_get_contents( $url );

        $results = json_decode( $google_api_response); //grab our results from Google
        $results = (array) $results; //cast them to an array
        $status = $results["status"]; //easily use our status
        $location_all_fields = (array) $results["results"][0];
        $location_geometry = (array) $location_all_fields["geometry"];
        $location_lat_long = (array) $location_geometry["location"];
        if( $status == 'OK'){
            $latitude = $location_lat_long["lat"];
            $longitude = $location_lat_long["lng"];
        }else{
            $latitude = '';
            $longitude = '';
        }

 $query="INSERT INTO STATECSS VALUES ('$name','$latitude','$longitude')";
  $raj->insertDatabase($query);
  echo "Inserted";
 }

}
?>