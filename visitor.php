<?php
session_start();
$visitorId =  $_GET['id'];
if(! (isset($_SESSION['name']))){
header ('location:adminpage.php');
}
?>
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


<?php
include 'DatabaseConnection.php';
$conn= new DatabaseConnection();
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
     date_default_timezone_set("America/Chicago");
     $time = time();
     $id = $visitorId;

     $query3 = "INSERT INTO COMMENT (Comment,Commenter,Time,id) VALUES('$comment','$commenter', '$time','$id')";
     $conn->insertDatabase($query3);
 }

 ?>
 <nav class="navbar navbar-inverse">
  <div class="container-fluid">

    <ul class="nav navbar-nav">

      <li class="active"><a href="#">View</a></li>
      <li><a href="edit.php?id=<?php echo $visitorId ; ?>">Edit</a></li>
    </ul>
  </div>
</nav>

<div class="container">
 <div class="well">
    <h1>Visitor's Profile</h1>
    <p><b>Visitor's Id :</b> <?php echo $id; ?></p>
     <p><b>Name :</b> <?php echo $fname.' '.$lname; ?></p>
      <p><b>Address :</b> <?php echo $city.' '.$state.' '.$zipcode.' '.$country; ?></p>
       <p><b>Email :</b> <?php echo $email; ?></p>
        <p><b>No. in Party :</b> <?php echo $party; ?></p>
         <p><b>Date :</b> <?php echo $date; ?></p>
          <p><b>Purpose :</b> <?php echo $purpose; ?></p>
           <p><b>How Did they hear ? :</b> <?php echo $hear; ?></p>
            <p><b>Did they stay in a hotel ? :</b> <?php echo $hotel; ?></p>
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
        <div class='well well-sm'>
        <p><font size='1'>submitted by ".$row2["Commenter"]." on ".date('d F Y h:i a', $row2["Time"])."</font></p><p>"
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
    <a href='admin.php'><button class="btn btn-success" type='button' >Go Back</button></a>



</div>
</body>
</html>