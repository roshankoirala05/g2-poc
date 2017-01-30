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


/*$sql = "CREATE TABLE MyGuests(
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL,
        city VARCHAR(30) NOT NULL,
        zipCode INT(6) NOT NULL
        
    
    )   ";
    
    if($conn->query($sql) === TRUE){
        echo"Table MYGuests created successfully"."<br>";
    }
    else{
        echo "Error creating table:".$conn->error."<br>";
        
    } */

 $sql = "INSERT INTO MyGuests (name, city, zipCode) VALUES ('".$_POST["firstName"]."','".$_POST["cityName"]."',".$_POST["zipCode"].")";


if ($conn->query($sql) === TRUE) {
    echo "Thank You for submitting your information. Your record has been stored in our database"."<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error."<br>";
}

/*echo "Name: ". $_POST["firstName"]."<br/>";
echo "City: ".$_POST["cityName"]."<br/>";
echo "State: ".$_POST["stateName"]."<br/>";
echo "Zipcode: ".$_POST["zipCode"]."<br/>";
echo "No. in party: ".$_POST["noInParty"]."<br/>";

echo "Traveling For: "; */

$conn->close(); 
?>

<!DOCTYPE html>
<html>
    <body>
        <form method="post" action="index.php">
            
            <input type="submit" value="Exit"/>
        </form>
    </body>
</html>