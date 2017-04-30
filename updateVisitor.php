<?php

session_start();
$visitorId =  $_GET['id'];
if(! (isset($_SESSION['name']))){
header ('location:adminpage.php');
}
include 'DatabaseConnection.php';
$conn= new DatabaseConnection();
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
$email=$_POST["email"];



          
$query1 = "UPDATE VISITOR SET Fname='$firstname' , Lname='$lastname', City='$city', State='$state',  Zipcode='$zipcode', Country='$country', Party='$noinparty', Purpose='$travelingfor', Hear='$howdidyouhear', Hotel='$didyoustay', Email='$email' WHERE id=$visitorId";
 $conn->insertDatabase($query1);

header('location:visitor.php?id='.$visitorId);
?>