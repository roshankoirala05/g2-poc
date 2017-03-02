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

/**********************************************************************************
            Checking How many times he visited. If he already visited
            then system update his no of visit.
**********************************************************************************/
   $raj= new DatabaseConnection();
   $queryCheckCount= "SELECT Vcount FROM VISITOR WHERE Fname='$firstname' AND Lname='$lastname' AND  Zipcode='$zipcode' AND City='$city'";
   $result=$raj->returnQuery($queryCheckCount);
   $row = $result->fetch_assoc();
    if($row["Vcount"] ==0)
        {
            $count=1;
            $query = "INSERT INTO VISITOR VALUES('$firstname','$lastname', '$city','$state',
                                                   '$zipcode','$country','$noinparty','$travelingfor','$howdidyouhear','$didyoustay','$email','$date','$count')";
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

            <input type="submit" value="Exit"/>
        </form>
    </body>
</html>