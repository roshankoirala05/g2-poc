/**********************************************************************
     WE NEED TO Mark these value in Map
*************************************************************************/

<?php
include 'DatabaseConnection.php';
 $raj= new DatabaseConnection();
$query = "SELECT Zipcode FROM VISITOR";
   $result= $raj->returnQuery($query);
   if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc())
    {
       echo $row[Zipcode];
    }
 }
 ?>
