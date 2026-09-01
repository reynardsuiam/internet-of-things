<?php

require_once "auth.php";
require_once "db.php";

requireRole("admin");

if (isset($_GET["id"]) && is_numeric($_GET["id"])) {

    $id = (int) $_GET["id"];

    $stmt = $conn->prepare(
        "UPDATE users
         SET status = 'rejected'
         WHERE id = ? AND role = 'employee'"
    );

    $stmt->bind_param("i", $id);
    $stmt->execute();
}

header("Location: admin_dashboard.php");
exit();

?>
