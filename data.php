<?php
include 'Database.php';
include 'DatabaseConnection.php';
$firstname= ucfirst($_POST["firstName"]);
$lastname= ucfirst($_POST["lastName"]);
$city= ucfirst($_POST["cityName"]);
$state=$_POST["stateName"];
$zipcode=$_POST["zipCode"];
$country=strtoupper($_POST["countryName"]);
$noinparty=$_POST["noInParty"];
$travelingfor=$_POST["TravelingFor"];
$howdidyouhear=$_POST["HowDidYouHear"];
$didyoustay=$_POST["DidYouStay"];
$email=null;
$count;
date_default_timezone_set('America/Chicago');
$date = date('Y/m/d h:i:s a', time());

/********************************************************************************************
 * Converting the Latitude and longitude for the address
 ********************************************************************************************/

        $url = "http://maps.googleapis.com/maps/api/geocode/json?address=$city,+$state,+$zipcode,+$country&sensor=false";
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

/**********************************************************************************
            Checking How many times he visited. If he already visited
            then system update his no of visit.
**********************************************************************************/
   $raj= new DatabaseConnection();
   $queryCheckCount= "SELECT Vcount FROM STATELATLONG WHERE Fname='$firstname' AND Lname='$lastname' AND  Zipcode='$zipcode' AND City='$city'";
   $result=$raj->returnQuery($queryCheckCount);
   $row = $result->fetch_assoc();
    if($row["Vcount"] ==0)
        {
            $count=1;
            $query = "INSERT INTO STATELATLONG VALUES('$firstname','$lastname', '$city','$state',
                                                   '$zipcode','$country','$noinparty','$travelingfor','$howdidyouhear','$didyoustay','$email','$date','$count','$latitude','$longitude')";
            $raj->insertDatabase($query);
        }

        else
        {
            $count=$row["Vcount"]+1;
            $query="UPDATE VISITOR SET Vcount=$count WHERE Fname='$firstname' AND Lname='$lastname' AND  Zipcode='$zipcode' AND City='$city'";
            $raj->insertDatabase($query);
        }

/**************************************************************************************
       Inserting Database class if we need
 **************************************************************************************

   $databaseValues = new Form($name,$lastname, $city,$state,$zipcode,$country,$noinparty,$travelingfor,$howdidyouhear,$didyoustay,$email,$count);
  /****************************************************************************************************************************/

?>
    <!DOCTYPE html>
    <html>

    <body>
        <form method="post" action="index.php">

            <input type="submit" value="Exit" />
        </form>
    </body>

    </html>
