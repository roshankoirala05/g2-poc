
<!-- PHP to comment in visitor -->
<?php
session_start();
$visitorId =  $_GET['id'];
if(! (isset($_SESSION['name']))){
header ('location:adminpage.php');
}
include 'DatabaseConnection.php';
$conn= new DatabaseConnection();
$commenter = $_SESSION['login_user'];
$comment = $_POST["comment"];
date_default_timezone_set("America/Chicago");
$time = time();
$id = $visitorId;

$query3 = "INSERT INTO COMMENT (Comment,Commenter,Time,id) VALUES('$comment','$commenter', '$time','$id')";
$conn->insertDatabase($query3);
echo"hi";
header ('location:visitor.php?id='.$visitorId);