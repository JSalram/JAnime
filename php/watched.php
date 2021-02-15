<?php

$anime = $_GET["anime"];
$user = $_GET["user"];
$w = $_GET["w"];

// $conn = new mysqli("localhost", "root", "", "series");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE users_watch_series SET watched=$w WHERE username_User='$user' AND name_Serie='$anime'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
