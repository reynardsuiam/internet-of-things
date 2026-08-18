<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>About Us - CS Department</title>

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

            <?php if (isset($_SESSION['user_id'])): ?>

                <li>
                    <a href="dashboard.php">Dashboard</a>
                </li>

                <li>
                    <a href="logout.php">Logout</a>
                </li>

            <?php else: ?>

                <li>
                    <a href="login.php">Login</a>
                </li>

                <li>
                    <a href="register.php">Register</a>
                </li>

            <?php endif; ?>

        </ul>

    </nav>

</header>


<section class="page-section">

    <h1>About Our Department</h1>

    <p>
        The Computer Science Department provides students
        with strong foundations in computer science,
        programming and information technology.
    </p>

    <p>
        Our department focuses on practical learning,
        innovation, research and professional development.
    </p>

    <h2>Our Vision</h2>

    <p>
        To develop skilled and innovative professionals
        capable of solving real-world problems using technology.
    </p>

    <h2>Our Mission</h2>

    <p>
        We aim to provide quality education, encourage
        research and create opportunities for students
        to develop their technical and professional skills.
    </p>

</section>


<footer>
    <p>&copy; 2026 Computer Science Department</p>
</footer>

</body>
</html>