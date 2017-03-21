<?php 
session_start();
include 'DatabaseConnection.php';
$conn= new DatabaseConnection();


$visitorId =  $_GET['id'];

$query1 = "SELECT * FROM VISITOR WHERE id =".$visitorId;

$result= $conn->returnQuery($query1);
if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc())
    {
       $id = $row["id"];
       $fname = $row["Fname"];
       $lname= $row["Lname"];  
       $city = $row["City"];
       $state = $row["State"];
       $country = $row["Country"];
       $zipcode = $row["Zipcode"];
       $party = $row["Party"];
       $date = date('d F Y H:i:s', $row["Time"]);
       $purpose = $row["Purpose"];
       $hear = $row["Hear"];
       $hotel = $row["Hotel"];
       $email = $row["Email"];
       
       echo $id."<br>".$fname."<br>".$lname."<br>".$city."<br>".$state."<br>".$country."<br>".$zipcode."<br>".$party."<br>".$date."<br>".$purpose."<br>".$hear."<br>".$hotel."<br>".$email."<br>";
      
    }
    
    
    
 }
 
 if(!empty($_POST["comment"])){
     $commenter = $_SESSION["username"];
     $comment = $_POST["comment"];
     $time = time();
     $id = $visitorId;
     
     $query3 = "INSERT INTO COMMENT (Comment,Commenter,Time,id) VALUES('$comment','$commenter', '$time','$id')";
     $conn->insertDatabase($query3);
 }
 
 
 
 $query2= "SELECT * FROM  `COMMENT`WHERE id =".$visitorId;
 $result2= $conn->returnQuery($query2);
 
if ($result2->num_rows > 0) {
     
    while($row2 = $result2->fetch_assoc())
    {
        echo $row2["Comment"]."<br>";
        
    }
}

echo"<br>
    Comment Below <br>
    
   <br>
   
   <form action='visitor.php?id={$visitorId}'  method='post'>
  <textarea rows='4' cols='50' name='comment' placeholder='Enter your comment'></textarea>
  <input type='submit'>
</form>
    
";