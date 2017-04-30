<?php 
session_start();
$visitorId =  $_GET['id'];
$commentId = $_GET['commentId'];
if(! (isset($_SESSION['name']))){
header ('location:adminpage.php');
}
include 'DatabaseConnection.php';
$conn= new DatabaseConnection();




     
     $query3 = "DELETE FROM COMMENT WHERE Serialno= $commentId";
     $conn->insertDatabase($query3);
 
 header ('location:visitor.php?id='.$visitorId);