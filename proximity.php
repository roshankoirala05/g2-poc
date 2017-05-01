<?php

include 'DatabaseConnection.php';
$conn= new DatabaseConnection();
if (isset($_POST["Submit"]) && !empty($_POST["Submit"]))
{
    $city= ucwords(strtolower($_POST["city"]));
    $state=strtoupper($_POST["state"]);
$zipcode=strtoupper($_POST["zip"]);
$country=strtoupper($_POST["country"]);


    $lowmiles=$_POST['cityMilesLow'];
    $highmiles=$_POST['cityMilesHigh'];



/*******************************************************************************************
 * Converting the Latitude and longitude for the address
 ********************************************************************************************/
        $address = urlencode($city." ,".$state.", ".$zipcode.", ".$country);
        $url = "http://maps.googleapis.com/maps/api/geocode/json?address=$address&sensor=false";
        $google_api_response =file_get_contents( $url );
        $results = json_decode( $google_api_response);
        $results = (array) $results;
        $status = $results["status"];
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


        $query= "SELECT Fname, Lname, City, State, Zipcode, ( 3959 * ACOS( COS( RADIANS( '$latitude' ) ) * COS( RADIANS( lat ) ) * COS( RADIANS( lng ) - RADIANS( '$longitude' ) ) + SIN( RADIANS( '$latitude' ) ) * SIN( RADIANS( lat ) ) ) ) AS distance
FROM VISITOR
HAVING distance <='$highmiles' AND distance >= '$lowmiles'
ORDER BY distance";

 $result= $conn->returnQuery($query);
   echo "<br>";
   if ($result->num_rows > 0) {
    echo"
    <div class='table-responsive'>
    <table class='table table-hover table-condensed'>
    <tr>
    <th>First Name </th>
    <th>Last Name </th>
    <th>City </th>
    <th>State </th>
    <th>Zipcode </th>
    <th>Distance Miles </th>
    </tr>

    ";
   $csvdata = array();

    while($row = $result->fetch_assoc())
    {

     $csvdata[]=array($row["Fname"],$row["Lname"],$row["City"], $row["Zipcode"],$row["State"],$row["distance"]);
    echo"
    <tr>
    <td><a href='visitor.php?id={$row["id"]}'>{$row["Fname"]}</a></td>
    <td>{$row["Lname"]}</td>
    <td>{$row["City"]}</td>
    <td>{$row["State"]}</td>
    <td>{$row["Zipcode"]}</td>
    <td>{$row["distance"]}</td>
    </tr>
    ";

    }
    echo"</table></div>"."\n";
   }
   echo "<br>";

    $query= "SELECT COUNT(*)
FROM ( SELECT Fname, Lname, City, State, Zipcode, ( 3959 * ACOS( COS( RADIANS( '$latitude' ) ) * COS( RADIANS( lat ) ) * COS( RADIANS( lng ) - RADIANS( '$longitude' ) ) + SIN( RADIANS( '$latitude' ) ) * SIN( RADIANS( lat ) ) ) ) AS distance
FROM VISITOR
HAVING distance <='$highmiles' AND distance >= '$lowmiles'
ORDER BY distance
) AS T";

 $result= $conn->returnQuery($query);
   echo "<br>";
   if ($result->num_rows > 0) {
    echo"
    <div class='table-responsive'>
    <table class='table table-hover table-condensed'>
    <tr>
    <th>Total Number within area </th>
    </tr>

    ";
   $csvdata = array();

    while($row = $result->fetch_assoc())
    {

     $csvdata[]=array($row["COUNT(*)"]);
    echo"
    <tr>
    <td>{$row["COUNT(*)"]}</td>
    </tr>
    ";

    }
    echo"</table></div>";


 }
 echo "<br>";
echo "Summery";

    $query= " SELECT City, COUNT(City)
    FROM
    (SELECT Fname, Lname, City, State, Zipcode, ( 3959 * ACOS( COS( RADIANS( '$latitude' ) ) * COS( RADIANS( lat ) ) * COS( RADIANS( lng ) - RADIANS( '$longitude' ) ) + SIN( RADIANS( '$latitude' ) ) * SIN( RADIANS( lat ) ) ) ) AS distance
FROM VISITOR
HAVING distance <='$highmiles' AND distance >= '$lowmiles'
ORDER BY distance
) AS T
GROUP BY City";

 $result= $conn->returnQuery($query);
   echo "<br>";
   if ($result->num_rows > 0) {
    echo"
    <div class='table-responsive'>
    <table class='table table-hover table-condensed'>
    <tr>
    <th>City </th>
    <th>No of People </th>
    </tr>

    ";
   $csvdata = array();

    while($row = $result->fetch_assoc())
    {

     $csvdata[]=array($row["City"],$row["COUNT(City)"]);
    echo"
    <tr>
    <td>{$row["City"]}</td>
    <td>{$row["COUNT(City)"]}</td>
    </tr>
    ";

    }
    echo"</table></div>";


 }

}
?>