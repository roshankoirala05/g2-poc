<?php

include 'DatabaseConnection.php';
getZipcode("home");


 if(isset($_POST['zip_code']))
 {
 getZipcode($_POST['zip_code']);
 }

 function getZipcode($geocoder)
 {
      $raj= new DatabaseConnection();

   $query = "SELECT Zipcode FROM VISITOR";
   $result= $raj->returnQuery($query);
   if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc())
    {
      echo $row[Zipcode];
    }

 }
 //return $row[Zipcode];
 }
 ?>
