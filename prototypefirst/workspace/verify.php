<?php

if (isset($_POST['submit'])) {
    include 'DatabaseConnection.php';
    $raj          = new DatabaseConnection();
    $useremail    = $_POST['inputEmail'];
    $userpassword = $_POST['inputPassword'];
    $query        = "SELECT * FROM ADMIN
        WHERE Username='$useremail' AND
        Password='$userpassword'
        LIMIT 1";
    $result       = $raj->returnQuery($query);
    if ($result->num_rows == 1) {
        header("Location: users_page.php");
        exit;
    } else {

        header("Location: ADMINPAGE.php");
        exit;
    }
} else {
    header("Location: ADMINPAGE.php");
    exit;
}

?>