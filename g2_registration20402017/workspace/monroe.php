<?php
include 'DatabaseConnection.php';
 $raj= new DatabaseConnection();

/**************************************************************
          Retriving query
 **************************************************************/
$query = "SELECT * FROM VISITOR ORDER BY Fname, Lname";
 //$query = "SELECT COUNT(*) FROM VISITOR";
   $result= $raj->returnQuery($query);
   echo "" . "Name".  "<br>";
   if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc())
    {
       // echo "" . $row["COUNT(*)"].  "<br>";
       echo "" . $row["Fname"]. " ".$row["Lname"]. "<br>";
    }
 }
 /**********************************************************************/
 ?>

 <!DOCTYPE html>
<html>
    <body>
        <form method="post" action="index.php">

            <input type="submit" value="Exit"/>
        </form>
    </body>
</html>