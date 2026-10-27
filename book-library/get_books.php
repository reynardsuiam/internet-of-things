<?php
header("Content-Type: application/json; charset=UTF-8");

require_once "db.php";

$sql = "SELECT id, title, author FROM books ORDER BY id ASC";
$result = $conn->query($sql);

if (!$result) {
    http_response_code(500);

    echo json_encode([
        "error" => "Failed to retrieve books."
    ]);

    $conn->close();
    exit;
}

$books = [];

while ($row = $result->fetch_assoc()) {
    $books[] = $row;
}

echo json_encode($books);

$conn->close();
?>
