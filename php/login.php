<?php

if (isset($_POST["user"]) && isset($_POST["password"])) {
    $user = $_POST["user"];
    $password = $_POST["password"];

    $conn = new mysqli("localhost", "root", "", "series");

    $sql = "SELECT username, password FROM user WHERE username='$user' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        setcookie("user", $user);
    }
    $conn->close();
}

header("Location: ../index.php");
