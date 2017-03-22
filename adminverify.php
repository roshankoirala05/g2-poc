<?php
if (isset($_POST['submit'])) {
    include 'DatabaseConnection.php';
    $conn         = new DatabaseConnection();
    $useremail    = $_POST['inputEmail'];
    $userpassword = $_POST['inputPassword'];
    $query        = "SELECT * FROM ADMIN
        WHERE Username='$useremail' AND
        Password='$userpassword'
        LIMIT 1";
    $result = $conn->returnQuery($query);
    if ($result->num_rows == 1) {

        session_start();

        $_SESSION["username"] = $useremail;
        $_SESSION["password"] = $userpassword;
        $query2 = "SELECT Fname FROM ADMIN
        WHERE Username='$useremail'";
        $result2 = $conn->returnQuery($query2)->fetch_assoc();
        $_SESSION["name"]=$result2['Fname'];
        echo $_SESSION['name'];

        header("Location: admin.php");


        exit;
    } else {
        header("Location: adminpage.php");
        exit;
    }
} else {
    header("Location: adminpage.php");
    exit;
}
?>