<?php

require_once "auth.php";
require_once "db.php";

requireRole("employee");

$stmt = $conn->prepare(
    "SELECT full_name, email, phone, department,
            designation, address, created_at
     FROM users
     WHERE role = 'admin'
     ORDER BY full_name"
);

$stmt->execute();

$admins = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Employee Dashboard</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<header>

    <nav class="navbar">

        <div class="logo">
            TechNova
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

    <h1>Employee Dashboard</h1>

    <p>
        Welcome to the TechNova employee portal.
    </p>

    <h2>Administrator Details</h2>

    <div class="table-container">

        <table>

            <thead>

                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Department</th>
                    <th>Designation</th>
                    <th>Address</th>
                </tr>

            </thead>

            <tbody>

            <?php if ($admins->num_rows > 0): ?>

                <?php while ($admin = $admins->fetch_assoc()): ?>

                    <tr>

                        <td>
                            <?= htmlspecialchars($admin["full_name"]) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($admin["email"]) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($admin["phone"]) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($admin["department"]) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($admin["designation"]) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($admin["address"]) ?>
                        </td>

                    </tr>

                <?php endwhile; ?>

            <?php else: ?>

                <tr>
                    <td colspan="6">
                        No administrator details available.
                    </td>
                </tr>

            <?php endif; ?>

            </tbody>

        </table>

    </div>

</main>

</body>
</html>
