<?php

include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $department = $_POST["department"];
    $salary = $_POST["salary"];

    $sql = "INSERT INTO employees
            (id, name, email, phone, department, salary)
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "sssssd",
        $id,
        $name,
        $email,
        $phone,
        $department,
        $salary
    );

    try {

        if ($stmt->execute()) {

            echo "<h2>Employee details saved successfully!</h2>";
            echo "<a href='index.html'>Add another employee</a><br>";
            echo "<a href='employees.php'>View all employees</a>";

        }

    } catch (mysqli_sql_exception $e) {

        if ($e->getCode() == 1062) {

            echo "<h2>Employee ID already exists!</h2>";
            echo "<p>The ID <strong>" . htmlspecialchars($id) . "</strong> is already in use.</p>";
            echo "<p>Please go back and enter a different Employee ID.</p>";
            echo "<a href='index.html'>Go back to form</a>";

        } else {

            echo "Database error: " . $e->getMessage();

        }
    }

    $stmt->close();
    $conn->close();
}

?>