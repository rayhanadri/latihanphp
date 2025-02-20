<?php
include "crud.php";

$crud = new crud();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST["inputUsername"]);
    $password = htmlspecialchars($_POST["inputPassword"]);

    $checkLoginResult = $crud->checkLogin($username, $password);

    if ($checkLoginResult == true) {
        session_unset();
        session_start();
        $_SESSION['username'] = $username;

        echo $_SESSION['username'];
        header("Location: index.php");
        exit();
    }
}
?>