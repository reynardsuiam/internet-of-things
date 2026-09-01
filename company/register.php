<?php

require_once "db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $full_name = trim($_POST["full_name"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $phone = trim($_POST["phone"]);
    $department = trim($_POST["department"]);
    $designation = trim($_POST["designation"]);
    $address = trim($_POST["address"]);

    if (
        empty($full_name) ||
        empty($email) ||
        empty($password)
    ) {

        $message = "Please fill in all required fields.";

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $message = "Please enter a valid email address.";

    } elseif (strlen($password) < 6) {

        $message = "Password must contain at least 6 characters.";

    } else {

        $check = $conn->prepare(
            "SELECT id FROM users WHERE email = ?"
        );

        $check->bind_param("s", $email);
        $check->execute();

        $result = $check->get_result();

        if ($result->num_rows > 0) {

            $message = "An account with this email already exists.";

        } else {

            $hashed_password = password_hash(
                $password,
                PASSWORD_DEFAULT
            );

            $role = "employee";
            $status = "pending";

            $stmt = $conn->prepare(
                "INSERT INTO users
                (full_name, email, password, phone, department,
                 designation, address, role, status)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"
            );

            $stmt->bind_param(
                "sssssssss",
                $full_name,
                $email,
                $hashed_password,
                $phone,
                $department,
                $designation,
                $address,
                $role,
                $status
            );

            if ($stmt->execute()) {

                header("Location: login.php?registered=1");
                exit();

            } else {

                $message = "Registration failed. Please try again.";
            }

            $stmt->close();
        }

        $check->close();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Employee Registration</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<header>

    <nav class="navbar">

        <div class="logo">
            TechNova
        </div>

        <ul class="nav-links">

            <li>
                <a href="index.php">Home</a>
            </li>

            <li>
                <a href="register.php">Register</a>
            </li>

            <li>
                <a href="login.php">Login</a>
            </li>

        </ul>

    </nav>

</header>

<div class="form-container">

    <div class="form-box">

        <h2>Employee Registration</h2>

        <?php if ($message): ?>

            <div class="error">
                <?= htmlspecialchars($message) ?>
            </div>

        <?php endif; ?>

        <form method="POST" id="registerForm">

            <label>Full Name *</label>

            <input
                type="text"
                name="full_name"
                required
            >

            <label>Email *</label>

            <input
                type="email"
                name="email"
                required
            >

            <label>Password *</label>

            <input
                type="password"
                name="password"
                id="password"
                required
            >

            <label>Phone</label>

            <input
                type="text"
                name="phone"
            >

            <label>Department</label>

            <select name="department">

                <option value="">Select Department</option>
                <option value="IT">IT</option>
                <option value="HR">HR</option>
                <option value="Finance">Finance</option>
                <option value="Marketing">Marketing</option>
                <option value="Sales">Sales</option>

            </select>

            <label>Designation</label>

            <input
                type="text"
                name="designation"
            >

            <label>Address</label>

            <textarea name="address"></textarea>

            <button type="submit" class="btn full">
                Register
            </button>

        </form>

        <p class="form-footer">
            Already have an account?
            <a href="login.php">Login here</a>
        </p>

    </div>

</div>

<script src="js/script.js"></script>

</body>
</html>
