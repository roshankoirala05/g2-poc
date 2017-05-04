
<!-- Create Admin -->
<?php
include 'DatabaseConnection.php';
$conn = new DatabaseConnection();
session_start();
if(isset($_POST['submit']))
{
$fname   = ucwords(strtolower($_POST['Fname']));
$lname = ucwords(strtolower($_POST['Lname']));
$useremail = strtolower($_POST['username']);
$password =$_POST['password'];
$securityquestion=$_POST['Security'];
$securityanswer=ucwords(strtolower($_POST['Answer']));
$dateofbirth=$_POST['bday'];

$query="SELECT * FROM ADMIN WHERE Username='$useremail'";
$result=$conn->returnQuery($query);
if ($result->num_rows == 1) {
$_SESSION['message']="Username is already Exit"; // Initializing Session

header("location: createAccount.php"); // Redirecting To Other Page
}
else{
$query= "INSERT INTO ADMIN VALUES ('$fname','$lname','$useremail','$password','$securityquestion','$securityanswer','$dateofbirth')";
echo $query;
$conn->insertDatabase($query);
$_SESSION['message']='ADMIN successfully added';
header('Location:createAccount.php');
}

}
?>