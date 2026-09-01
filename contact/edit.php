<?php
include "db.php";

if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    header("Location: index.php");
    exit;
}

$id = (int) $_GET["id"];

$stmt = $conn->prepare("SELECT * FROM contacts WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$contact = $result->fetch_assoc();

if (!$contact) {
    header("Location: index.php");
    exit;
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $first_name = trim($_POST["first_name"]);
    $last_name  = trim($_POST["last_name"]);
    $email      = trim($_POST["email"]);
    $phone      = trim($_POST["phone"]);
    $address    = trim($_POST["address"]);

    if ($first_name === "" || $last_name === "" || $email === "") {
        $error = "Please fill in all required fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Please enter a valid email address.";
    } else {

        $stmt = $conn->prepare(
            "UPDATE contacts
             SET first_name = ?,
                 last_name = ?,
                 email = ?,
                 phone = ?,
                 address = ?
             WHERE id = ?"
        );

        $stmt->bind_param(
            "sssssi",
            $first_name,
            $last_name,
            $email,
            $phone,
            $address,
            $id
        );

        if ($stmt->execute()) {
            header("Location: index.php");
            exit;
        }

        $error = "Unable to update contact.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Contact</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container small-container">

    <div class="header">

        <div>
            <h1>Edit Contact</h1>
            <p>Update contact information</p>
        </div>

        <a href="index.php" class="btn btn-secondary">
            Back
        </a>

    </div>

    <div class="card">

        <?php if ($error): ?>
            <div class="error">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <form method="POST" onsubmit="return validateForm();">

            <div class="form-row">

                <div class="form-group">
                    <label>First Name *</label>

                    <input
                        type="text"
                        name="first_name"
                        id="first_name"
                        value="<?= htmlspecialchars($contact['first_name']) ?>"
                        required
                    >
                </div>

                <div class="form-group">
                    <label>Last Name *</label>

                    <input
                        type="text"
                        name="last_name"
                        id="last_name"
                        value="<?= htmlspecialchars($contact['last_name']) ?>"
                        required
                    >
                </div>

            </div>

            <div class="form-group">

                <label>Email *</label>

                <input
                    type="email"
                    name="email"
                    id="email"
                    value="<?= htmlspecialchars($contact['email']) ?>"
                    required
                >

            </div>

            <div class="form-group">

                <label>Phone</label>

                <input
                    type="text"
                    name="phone"
                    id="phone"
                    value="<?= htmlspecialchars($contact['phone']) ?>"
                >

            </div>

            <div class="form-group">

                <label>Address</label>

                <textarea
                    name="address"
                    id="address"
                    rows="4"
                ><?= htmlspecialchars($contact['address']) ?></textarea>

            </div>

            <button type="submit" class="btn btn-primary">
                Update Contact
            </button>

            <a href="index.php" class="btn btn-secondary">
                Cancel
            </a>

        </form>

    </div>

</div>

<script src="script.js"></script>

</body>
</html>