<?php
$servername="localhost";
$username = "roshankoirala05";
$password="";
$dbname="c9";


//Creating Connection
$conn = new mysqli($servername, $username, $password,$dbname);

//Check connection
if($conn->connect_error){
    
    die("Connection failed: ".$conn->connect_error);
}
echo "Connected successfully";

$sql = "CREATE TABLE MyGuests(
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL,
        city VARCHAR(30) NOT NULL,
        zipCode INT(6) NOT NULL
        
    
    )   ";
    
    if($conn->query($sql) === TRUE){
        echo"Table MYGuests created successfully";
    }
    else{
        echo "Error creating table:".$conn->error;
        
    }

$conn->close();
?>