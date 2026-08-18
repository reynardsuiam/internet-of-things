<?php

session_start();

if (!isset($_SESSION["user_id"])) {

    header("Location: login.php");
    exit();

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Dashboard</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<header>

    <nav class="navbar">

        <div class="logo">
            CS Department
        </div>

        <ul class="nav-links">

            <li>
                <a href="index.php">Home</a>
            </li>

            <li>
                <a href="about.php">About Us</a>
            </li>

            <li>
                <a href="logout.php">Logout</a>
            </li>

        </ul>

    </nav>

</header>


<section class="dashboard">

    <h1>
        Welcome,
        <?php echo htmlspecialchars($_SESSION["user_name"]); ?>!
    </h1>

    <p>
        You are successfully logged into the
        Computer Science Department website.
    </p>

    <div class="user-card">

        <h2>Your Details</h2>

        <p>
            <strong>Name:</strong>
            <?php echo htmlspecialchars($_SESSION["user_name"]); ?>
        </p>

        <p>
            <strong>Email:</strong>
            <?php echo htmlspecialchars($_SESSION["user_email"]); ?>
        </p>

    </div>

</section>


<footer>

    <p>
        &copy; 2026 Computer Science Department
    </p>

</footer>

</body>
</html>