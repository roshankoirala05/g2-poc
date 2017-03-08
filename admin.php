<?php

session_start();
if(! (isset($_SESSION['name']))){
header ('location:adminpage.php');
}
?>
<html>
    <body>

     
<h1>Welcome <?php  echo $_SESSION['name'];?></h1>
<form action="adminpage.php" method="POST">
    
    <input type="submit" name="submit" Value="Log out">
</form>
<h3>Type one or more filters !</h3>

<br> <br>

<form method ="post" action = "admin.php">
    City <input type="text" name="city" value="<?php echo $_POST["city"];?>"/>
    State <input type="text" name="state" value="<?php echo $_POST["state"];?>"/>
    Zip <input type="text" name="zip" value="<?php echo $_POST["zip"];?>"/>
    Date <input type = "text" name="date" value="<?php echo $_POST["date"];?>"/>
    <input type="submit" value="Submit"/>
    
</form>
 <br>

 <?php
include 'DatabaseConnection.php';
$conn= new DatabaseConnection();
$query = "SELECT * FROM VISITOR";

$city = trim($_POST["city"]);
$state = trim($_POST["state"]);
$zip = trim($_POST["zip"]);
$date = trim($_POST["date"]);

if( $city!="" || $state !="" || $zip !="" || $date!="" ){
    $query.=" WHERE ";
    
    if ( $city!=""){
        $query.="City = '".$city."'";
        
    }
    if($state !=""){
        if (strpos($query,"=")===false){
            $query.=" State = '".$state."'";
        }
        else {
                 
            $query.=" AND State = '".$state."'";
        }
        
    }
    
    if($zip !=""){
        if (strpos($query,"=")===false){
            $query.=" Zipcode = '".$zip."'";
        }
        else {
                 
            $query.=" AND Zipcode = '".$zip."'";
        }
        
    }
    if($date!=""){
        if (strpos($query,"=")===false){
            $query.=" Time = '".$date."'";
        }
        else {
                 
            $query.=" AND Time = '".$date."'";
        }
        
    }
    
    
    
}
else{
    $query.=" ORDER BY Time DESC LIMIT 30 ";
}

/**************************************************************
          Retriving query
 **************************************************************/




 
   $result= $conn->returnQuery($query);
   echo "<br>";
   if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc())
    {
       echo "" . $row["Fname"]. " ".$row["Lname"]." ".$row["City"]." ".$row["State"]." ".$row["Country"]." ".$row["Zipcode"]." ".$row["Party"]." ".date('m/d/Y', $row["Time"])."<br>";
      
    }
 }
 ?>


<form method="post" action="index.php">

            <input type="submit" value="Exit"/>
        </form>
        </body>
</html>
