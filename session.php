<?php
  include 'DatabaseConnection.php';
     $conn = new DatabaseConnection();
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$query="select Fname from ADMIN where Username='$user_check'";
$result = $conn->returnQuery($query);
$row = $result->fetch_assoc();
$login_session =$row["Fname"];
if(!isset($login_session)){
mysql_close($connection); // Closing Connection
header('Location: index.php'); // Redirecting To Home Page
}
?>