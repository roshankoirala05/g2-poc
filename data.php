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
    
     
     //Query String for inserting guest information into guest registry database
     $sql = "INSERT INTO MyGuests (name, city, zipCode) VALUES ('".$_POST["firstName"]."','".$_POST["cityName"]."',".$_POST["zipCode"].")";
    
    
   // Executing query
    if ($conn->query($sql) === TRUE) {
        echo "Thank You for submitting your information. Your record has been stored in our database"."<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error."<br>";
    }
    
    
    // Closing sql connection
    $conn->close();  
    
    // html button for exiting back to home screen
    echo'
    
            <form method="post" action="index.html">
                
                <input type="submit" value="Exit"/>
            </form>
       ';

