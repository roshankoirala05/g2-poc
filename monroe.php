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

 $sql = "SELECT name from MyGuests where city='Monroe'";
$result =$conn->query($sql);


    echo "Here are the list of visitors from Monroe"."<br>"."<br>";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "" . $row["name"].  "<br>";
    }
} else {
    echo "0 results";
}
/*echo "Name: ". $_POST["firstName"]."<br/>";
echo "City: ".$_POST["cityName"]."<br/>";
echo "State: ".$_POST["stateName"]."<br/>";
echo "Zipcode: ".$_POST["zipCode"]."<br/>";
echo "No. in party: ".$_POST["noInParty"]."<br/>";

echo "Traveling For: "; */
 echo "<br>";
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