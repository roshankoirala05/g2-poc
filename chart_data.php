<?php
  include 'DatabaseConnection.php';
  $raj= new DatabaseConnection();

//the SQL query to be executed
$query = "SELECT State, COUNT( * ) AS Number
FROM VISITOR
GROUP BY State
HAVING COUNT( * ) >1";


//storing the result of the executed query
$result = $raj->returnQuery($query);

//initialize the array to store the processed data
$jsonArray = array();

//check if there is any data returned by the SQL Query
if ($result->num_rows > 0) {
  //Converting the results into an associative array
  while($row = $result->fetch_assoc()) {
    $jsonArrayItem = array();
    $jsonArrayItem['label'] = $row['State'];
    $jsonArrayItem['value'] = $row['Number'];
    //append the above created object into the main array.
    array_push($jsonArray, $jsonArrayItem);
  }
}


//set the response content type as JSON
header('Content-type: application/json');
//output the return value of json encode using the echo function.
echo json_encode($jsonArray);
?>
