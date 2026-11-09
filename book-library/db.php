<?php
$host = "sql213.infinityfree.com";
$username = "if0_43395628";
$password = "qHUhFcgaCIN";
$database = "if0_43395628_book13";

$conn = new mysqli(
    $host,
    $username,
    $password,
    $database
);

if ($conn->connect_error) {
    http_response_code(500);
    die("Database connection failed.");
}

$conn->set_charset("utf8mb4");
?>
