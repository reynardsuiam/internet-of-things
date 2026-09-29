<?php
include "db.php";

$result = $conn->query("SELECT * FROM contacts ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Management System</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <div class="header">
        <div>
            <h1>Contact Management</h1>
            <p>Manage your contacts easily</p>
        </div>

        <a href="add.php" class="btn btn-primary">+ Add Contact</a>
    </div>

    <div class="card">

        <?php if ($result->num_rows > 0): ?>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>

                <?php while ($contact = $result->fetch_assoc()): ?>

                    <tr>
                        <td><?= $contact['id'] ?></td>

                        <td>
                            <?= htmlspecialchars(
                                $contact['first_name'] . " " . $contact['last_name']
                            ) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($contact['email']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($contact['phone']) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($contact['address']) ?>
                        </td>

                        <td class="actions">
                            <a
                                href="edit.php?id=<?= $contact['id'] ?>"
                                class="btn btn-edit"
                            >
                                Edit
                            </a>

                            <a
                                href="delete.php?id=<?= $contact['id'] ?>"
                                class="btn btn-delete"
                                onclick="return confirmDelete();"
                            >
                                Delete
                            </a>
                        </td>
                    </tr>

                <?php endwhile; ?>

                </tbody>
            </table>
        </div>

        <?php else: ?>

            <div class="empty">
                <h2>No Contacts Found</h2>
                <p>Add your first contact to get started.</p>
                <a href="add.php" class="btn btn-primary">
                    Add Contact
                </a>
            </div>

        <?php endif; ?>

    </div>

</div>

<script src="script.js"></script>

</body>
</html>