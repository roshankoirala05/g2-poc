<?php
include 'Database.php';
include 'DatabaseConnection.php';
$name= $_POST["firstName"];
$city= $_POST["cityName"];
$state=$_POST["stateName"];
$zipcode=$_POST["zipCode"];
$country=$_POST["countryName"];
$noinparty=$_POST["noInParty"];
$travelingfor=$_POST["TravelingFor"];
$howdidyouhear=$_POST["HowDidYouHear"];
$didyoustay=$_POST["DidYouStay"];
$email=null;
$time = date("Y-m-d");

/**************************************************************************************
       Inserting Database
 **************************************************************************************/
   $query1 = "INSERT INTO VISITOR VALUES('$name', '$city','$state','$zipcode','$country','$noinparty','$travelingfor','$howdidyouhear','$didyoustay','$email','$time')";
    $raj= new DatabaseConnection();
    $raj->insertDatabase($query1);

/**************************************************************
          Retriving query
 **************************************************************/
   $query = "SELECT COUNT(*) FROM VISITOR";
  // $query = "SELECT * FROM VISITOR ORDER BY Name";
   $result= $raj->returnQuery($query);

   if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc())
    {
        echo "" . $row["COUNT(*)"].  "<br>";
    }
 }
/************************************************************************/

  /**********************************************************************************************

  // $databaseValues = new Form($name, $city,$state,$zipcode,$country,$noinparty,$travelingfor,$howdidyouhear,$didyoustay,$email);

  ****************************************************************************************************************************/

?>