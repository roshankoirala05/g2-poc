<html>
    <head>

        <title>Visitor Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
<div class="container">
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

      // echo $id."<br>".$fname."<br>".$lname."<br>".$city."<br>".$state."<br>".$country."<br>".$zipcode."<br>".$party."<br>".$date."<br>".$purpose."<br>".$hear."<br>".$hotel."<br>".$email."<br>";

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

 ?>
 <div class="well">
    <h1>Visitor's Profile</h1>
    <p>Visitor's Id : <?php echo $id; ?></p>
     <p>Name : <?php echo $fname.' '.$lname; ?></p>
      <p>Address : <?php echo $city.' '.$state.' '.$zipcode.' '.$country; ?></p>
       <p>Email : <?php echo $email; ?></p>
        <p>No. in Party : <?php echo $party; ?></p>
         <p>Date : <?php echo $date; ?></p>
          <p>Purpose : <?php echo $purpose; ?></p>
           <p>How Did they hear ? : <?php echo $hear; ?></p>
            <p>Did they stay in a hotel ? : <?php echo $hotel; ?></p>
  </div>

  <div class="page-header">
  <h1>Comments</h1>
</div>

 <?php
 $query2= "SELECT * FROM  `COMMENT`WHERE id =".$visitorId;
 $result2= $conn->returnQuery($query2);

if ($result2->num_rows > 0) {

    while($row2 = $result2->fetch_assoc())
    {
        echo"
        <div class='well'>
        <p>submitted by ".$row2["Commenter"]." on ".date('d F Y H:i:s', $row2["Time"])."</p><p>"
        .$row2["Comment"]."</p></div>";

    }
}
?>
<br>
    Comment Below <br>

   <br>

   <form action='visitor.php?id=<?php echo $visitorId;?>'  method='post'>
  <textarea rows='4' cols='50' name='comment' placeholder='Enter your comment'></textarea>
  <input type='submit'>
</form>
    <a href='admin.php'><button type='button' >Go Back</button></a>



</div>
</body>
</html>