<?php
session_start();
$visitorId =  $_GET['id'];
include 'DatabaseConnection.php';
$conn= new DatabaseConnection();
$query3 = "DELETE FROM VISITOR WHERE id= $visitorId";
$conn->insertDatabase($query3);
header ('location:admin.php');
?>