<?php

$servername = "sql213.infinityfree.com";
$username = "if0_43395628";
$password = "qHUhFcgaCIN ";
$database = "if0_43395628_employee13";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

?>