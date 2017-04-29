<html>
    <head>
     
     <script type="text/javascript">
            function jsfunction(){
                 window.location.href = "index.php?"+"setuppassword";
            }
       </script>
     </head>
     
     <body>

<?php
 include 'DatabaseConnection.php';
  $conn = new DatabaseConnection();
  session_start(); // Starting Session
if (isset($_POST['submit'])) {
    
    $fname    = ucwords(strtolower($_POST['Fname']));
    $lname = ucwords(strtolower($_POST['Lname']));
    $useremail = strtolower($_POST['username']);
    $securityquestion=$_POST['Security'];
    $securityanswer=ucwords(strtolower($_POST['Answer']));
    $dateofbirth=$_POST['bday'];
    $setpassword =$_POST['newpassword'];
// Define $username and $password
 $query = "SELECT * FROM ADMIN
        WHERE Fname='$fname' AND
        Lname='$lname' AND
        Username='$useremail' AND
        Security='$securityquestion' AND
        Answer='$securityanswer' AND
        Birthday='$dateofbirth'
        LIMIT 1";
    $result=$conn->returnQuery($query);
    if ($result->num_rows == 1) {
     $query= "UPDATE ADMIN SET  Password ='$setpassword' WHERE Fname = '$fname' AND Lname = '$lname' AND Username = '$useremail' AND Security='$securityquestion' AND
              Answer='$securityanswer' AND Birthday='$dateofbirth'";
      $conn->insertDatabase($query);
       
       // Send Email to USER
      $to      = 'subedin@warhawks.ulm.edu';
       $subject = 'Update Account in MWMCVB';
        $message = 'Hello you password was successfully changed' ."\n Username: ".$useremail."\n Password: ".$setpassword;
       $headers = 'From: webmaster@example.com' . "\r\n" .
       'Reply-To: webmaster@example.com' . "\r\n" .
       'X-Mailer: PHP/' . phpversion();
        mail($to, $subject, $message, $headers);
        $_SESSION['messagelogin'] = "Your Password was successfully rest!!";
    header("location:index.php");
} else {
    $_SESSION['messageforgot'] = "Make sure the Fname, Lname and Username!!";
      echo '<script type="text/javascript">',
               'jsfunction();',
                
       '</script>';
}
}
?>
</body>
</html>