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
    
    echo "<br>";
    
    $conn->close(); 
    
    
    echo'
            <form method="post" action="index.html">
                
                <input type="submit" value="Exit"/>
            </form>
    ';   