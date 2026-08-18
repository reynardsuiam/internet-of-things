<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Computer Science Department</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<header>
    <nav class="navbar">

        <div class="logo">
            CS Department
        </div>

        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About Us</a></li>

            <?php if (isset($_SESSION['user_id'])): ?>

                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="logout.php">Logout</a></li>

            <?php else: ?>

                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>

            <?php endif; ?>
        </ul>

    </nav>
</header>


<section class="hero">

    <div class="hero-content">

        <h1>Computer Science Department</h1>

        <p>
            Welcome to our department. Learn, innovate,
            and build the technology of tomorrow.
        </p>

        <a href="about.php" class="btn">
            Explore Department
        </a>

    </div>

</section>


<section class="features">

    <h2>Why Choose Our Department?</h2>

    <div class="cards">

        <div class="card">
            <h3>Quality Education</h3>
            <p>
                Learn programming, databases, web development,
                artificial intelligence and more.
            </p>
        </div>

        <div class="card">
            <h3>Experienced Faculty</h3>
            <p>
                Learn from experienced teachers and
                industry-oriented professionals.
            </p>
        </div>

        <div class="card">
            <h3>Modern Labs</h3>
            <p>
                Practice your technical skills using
                modern computer laboratories.
            </p>
        </div>

    </div>

</section>


<footer>
    <p>&copy; 2026 Computer Science Department</p>
</footer>

<script src="script.js"></script>

</body>
</html>