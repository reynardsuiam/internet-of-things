<?php

session_start();

require_once "db.php";

$message = "";

if (isset($_GET["registered"])) {
    $message = "Registration successful. Please login.";
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    if (empty($email) || empty($password)) {

        $message = "Please enter email and password.";

    } else {

        $stmt = $conn->prepare(
            "SELECT id, full_name, email, password, role, status
            FROM users
            WHERE email = ?"
        );


        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows === 1) {

            $user = $result->fetch_assoc();

            if (password_verify($password, $user["password"])) {

                if ($user["status"] === "pending") {
                    $message = "Your account is waiting for admin approval.";
                } elseif ($user["status"] === "rejected") {
                    $message = "Your account registration was rejected.";
                } else {

                session_regenerate_id(true);

                $_SESSION["user_id"] = $user["id"];
                $_SESSION["full_name"] = $user["full_name"];
                $_SESSION["email"] = $user["email"];
                $_SESSION["role"] = $user["role"];

                if ($user["role"] === "admin") {
                    header("Location: admin_dashboard.php");
                } else {
                    header("Location: employee_dashboard.php");
                }

                exit();
            }

        } else {
            $message = "Invalid email or password.";
        }


        } else {

            $message = "Invalid email or password.";
        }

        $stmt->close();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Login - TechNova</title>

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

        <h2>Login</h2>

        <?php if ($message): ?>

            <div class="message">
                <?= htmlspecialchars($message) ?>
            </div>

        <?php endif; ?>

        <form method="POST">

            <label>Email</label>

            <input
                type="email"
                name="email"
                required
            >

            <label>Password</label>

            <input
                type="password"
                name="password"
                required
            >

            <button type="submit" class="btn full">
                Login
            </button>

        </form>

        <p class="form-footer">
            New employee?
            <a href="register.php">Create an account</a>
        </p>

    </div>

</div>

</body>
</html>
