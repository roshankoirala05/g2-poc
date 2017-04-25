<?php
 include 'DatabaseConnection.php';
  $conn = new DatabaseConnection();
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {

    
    $useremail    = strtolower($_POST['username']);
    $userpassword = $_POST['password'];
    
     
// Define $username and $password
 $query = "SELECT * FROM ADMIN
        WHERE Username='$useremail' AND
        Password='$userpassword'
        LIMIT 1";

    $result=$conn->returnQuery($query);
    if ($result->num_rows == 1) {
       
       $_SESSION['login_user']=$useremail; // Initializing Session
      
        header("location: profile.php"); // Redirecting To Other Page
} else {
    $_SESSION['messagelogin'] = "Username and Password is Invalid !!";
    header("location:index.php");
}
}
?>