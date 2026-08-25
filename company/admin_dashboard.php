<?php

require_once "auth.php";
require_once "db.php";

requireRole("admin");

$stmt = $conn->prepare(
    "SELECT id, full_name, email, phone, department,
            designation, address, created_at
     FROM users
     WHERE role = 'employee'
     ORDER BY created_at DESC"
);

$stmt->execute();

$employees = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<header>

    <nav class="navbar">

        <div class="logo">
            TechNova Admin
        </div>

        <div class="user-area">

            Welcome,
            <?= htmlspecialchars($_SESSION["full_name"]) ?>

            <a href="logout.php" class="logout">
                Logout
            </a>

        </div>

    </nav>

</header>

<main class="dashboard">

    <h1>Admin Dashboard</h1>

    <p>
        View all registered TechNova employees below.
    </p>

    <h2>Employee Details</h2>

    <div class="table-container">

        <table>

            <thead>

                <tr>

                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Department</th>
                    <th>Designation</th>
                    <th>Address</th>
                    <th>Registered</th>

                </tr>

            </thead>

            <tbody>

            <?php if ($employees->num_rows > 0): ?>

                <?php while ($employee = $employees->fetch_assoc()): ?>

                    <tr>

                        <td>
                            <?= htmlspecialchars($employee["id"]) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($employee["full_name"]) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($employee["email"]) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($employee["phone"]) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($employee["department"]) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($employee["designation"]) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($employee["address"]) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($employee["created_at"]) ?>
                        </td>

                    </tr>

                <?php endwhile; ?>

            <?php else: ?>

                <tr>

                    <td colspan="8">
                        No employees registered yet.
                    </td>

                </tr>

            <?php endif; ?>

            </tbody>

        </table>

    </div>

</main>

</body>
</html>
