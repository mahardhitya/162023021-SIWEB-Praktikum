<?php
session_start();

$user_admin = "mahardhitya";
$pass_admin = "mahardhitya04";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == $user_admin && $password == $pass_admin) {
        $_SESSION['username'] = $username;

        if (isset($_POST['remember'])) {
            setcookie('username', $username, time() + 3600, '/');
        }

        header("Location: ../../../index.php");
        exit();
    } else {
        header("Location: ../../../login.php?error=1");
        exit();
    }
}
?>