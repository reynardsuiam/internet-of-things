<?php

$host = "sql213.infinityfree.com";
$username = "if0_43395628";
$password = "qHUhFcgaCIN";
$database = "if0_43395628_contact13";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error){
    die("Database connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");

?>