<?php
$connection = mysqli_connect('localhost', 'root', '', 'plantnest');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $a = mysqli_real_escape_string($connection, $_POST['txt']);
    $b = mysqli_real_escape_string($connection, $_POST['email']);
    $c = mysqli_real_escape_string($connection, $_POST['pswd']);

    // Check if the email is already registered
    $checkEmailQuery = "SELECT COUNT(*) FROM cust_data WHERE Email = '$b'";
    $emailResult = mysqli_query($connection, $checkEmailQuery);
    $emailCount = mysqli_fetch_row($emailResult)[0];

    if ($emailCount == 0) {
        $sql = "INSERT INTO cust_data (Username, Email, Password) VALUES ('$a', '$b', '$c')";

        if (mysqli_query($connection, $sql)) {
            header('Location: Login-Signup.php');
            exit();
        } else {
            header('Location: Signup.php');
            exit();

        }
    } 
}

mysqli_close($connection);
?>