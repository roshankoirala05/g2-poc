
<!DOCTYPE html>
<html>
    <body>
<h1>Type one or more filters !</h1>

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
 $raj= new DatabaseConnection();
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
    $query.=" LIMIT 30 ";
}

/**************************************************************
          Retriving query
 **************************************************************/




 //$query = "SELECT COUNT(*) FROM VISITOR";
   $result= $raj->returnQuery($query);
   echo "<br>";
   if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc())
    {
       echo "" . $row["Fname"]. " ".$row["Lname"]." ".$row["City"]." ".$row["State"]." ".$row["Zipcode"]." ".$row["No. in Party"]."<br>";
      
    }
 }
 ?>


<form method="post" action="index.php">

            <input type="submit" value="Exit"/>
        </form>
        </body>
</html>
