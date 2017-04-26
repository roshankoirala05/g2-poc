<?php
/*
Site : http:www.smarttutorials.net
Author :muni
*/
include 'DatabaseConnection.php';
  $conn = new DatabaseConnection();
 if (isset($_GET['user'])) {
 $useremail = strtolower($_GET['user']);
	$query = "SELECT Fname, Lname, Security FROM ADMIN WHERE Username='$useremail'";
	$result = $conn->returnQuery($query);
	 if ($result->num_rows == 1) {
	$row = $result->fetch_assoc();
	$data=array('Fname' => $row['Fname'] ,'Lname' => $row['Lname'],'Security' => $row['Security']);
	echo json_encode($data);
	exit();
	 }
	 else{
	$row = $result->fetch_assoc();
	$data=array('Fname' => $row['Fname'] ,'Lname' => $row['Lname'],'Security' => $row['Security']);
	echo json_encode($data);
	 }
	 exit();
 }
?>