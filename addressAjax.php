<?php
include 'DatabaseConnection.php';
$conn = new DatabaseConnection();
if($_GET)
{
$city = $_GET['city'];
$state=$_GET['state'];
$country=$_GET['country'];

if($country=="US")
{
$query = "SELECT Count(*) AS number, City, State, Country FROM VISITOR WHERE City='$city' AND State='$state' AND Country='$country'";
$result = $conn->returnQuery($query);
if ($result->num_rows == 1) {
$row = $result->fetch_assoc();
$data=array('number' => $row['number']+1 ,'City' => $city,'State' => $state, 'Country' => $country);
echo json_encode($data);
exit();
}
}
else{
$query = "SELECT Count(*) AS number, Country FROM VISITOR WHERE Country='$country'";
$result = $conn->returnQuery($query);
if ($result->num_rows == 1) {
$row = $result->fetch_assoc();
$data=array('number' => $row['number']+1, 'Country' => $country);
echo json_encode($data);
exit();

}
}

}
?>