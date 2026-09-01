<?php

include "db.php";

if (isset($_GET["id"]) && is_numeric($_GET["id"])) {

    $id = (int) $_GET["id"];

    $stmt = $conn->prepare(
        "DELETE FROM contacts WHERE id = ?"
    );

    $stmt->bind_param("i", $id);

    $stmt->execute();
}

header("Location: index.php");
exit;

?>